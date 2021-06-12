<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {

        //validation
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required',
        ]);

        //recoger datos
        $user = Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //asigno los valores
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //guardar en la DB
        $comment->save();

        return redirect()->route('image.detail', ['id' => $image_id])
            ->with([
                'message' => 'has publicado tu mensaje correctamente'
            ]);
    }

    public function delete($id){
        //Conseguir datos del usuarios identificado
        $user = Auth::user();

        //Conseguir objeto del comentario
        $comment = Comment::find($id);

        //Comprobar si soy el dueño del comentario o de la publicacion
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image_id])
            ->with([
                'message' => 'Comentario eliminado correctamente'
            ]);
        }else {
            return redirect()->route('image.detail', ['id' => $comment->image_id])
            ->with([
                'message' => 'El comentario no se ha eliminado'
            ]);
        }
    }
}
