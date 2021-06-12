<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $table = 'likes';

    //relacion many to one / de uno a muchos
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    //relacion many to one / de uno a muchos
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
