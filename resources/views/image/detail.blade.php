@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('includes.message')
                <div class="card pub-image pub-image-detail">
                    <div class="card-header">
                        @if ($image->user->image)
                            <div class="container-avatar">
                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}"
                                    class="avatar" />
                            </div>
                        @endif
                        <div class="data-user">
                            {{ $image->user->name . ' ' . $image->user->surname }}
                            <span class="nickname">
                                {{ ' | @' . $image->user->nick }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="image-container image-detail">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="" />
                        </div>
                    </div>
                    <div class="description">
                        <span class="nickname">{{ '@' . $image->user->nick }} </span>
                        <span class="nickname date">{{ ' | ' . \FormatTime::LongTimeFilter($image->created_at) }}</span>
                        <p>{{ $image->description }}</p>
                    </div>
                    <div>
                        <div class="likes">
                            <div>
                                <?php $user_like = false; ?>
                                <!--comprobar si el usuario le dio like a la imagen-->
                                @foreach ($image->likes as $like)
                                    @if ($like->user->id == Auth::user()->id)
                                        <?php $user_like = true; ?>
                                    @endif
                                @endforeach

                                @if ($user_like)
                                    <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}"
                                        class="btn-like" />
                                @else
                                    <img src="{{ asset('img/heart-black.png') }}" data-id="{{ $image->id }}"
                                        class="btn-dislike" />
                                @endif
                                <span class="number-likes"
                                    id="image-{{ $image->id }}">{{ count($image->likes) }}</span>
                            </div>
                        </div>

                        @if (Auth::user() && Auth::user()->id == $image->user_id)
                            <div class="actions">
                                <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>

                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                    Eliminar
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h2 class="modal-title">¿Estas seguro?</h2>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Si eliminas esta imagen nunca podras recuperarla, ¿estas seguro de querer borrarla?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-dismiss="modal">Cancelar</button>
                                                <a href="{{ route('image.delete', ['id' => $image->id]) }}"
                                                    class="btn btn-danger">Borrar definitivamente</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="clearfix"></div>
                        <div class="comments">

                            <h2> Comentarios ({{ count($image->comments) }}) </h2>
                            <hr>
                            <form action="{{ route('comment.save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <p>
                                    <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                        name="content"></textarea>
                                </p>
                                @error('content')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-success">
                                    enviar
                                </button>
                            </form>
                            <hr>
                            @foreach ($image->comments as $comment)
                                <div class="comment">
                                    <span class="nickname">{{ '@' . $comment->user->nick }} </span>
                                    <span
                                        class="nickname date">{{ ' | ' . \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                    <p>{{ $comment->content }}</p>
                                    @if (Auth::check() && ($comment->user_id == Auth::user()->id || $image->user_id == Auth::user()->id))
                                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                                            class="btn btn-sm btn-danger">Eliminar</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
