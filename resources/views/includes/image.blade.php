<div class="card pub-image">
    <div class="card-header">
        
        @if ($image->user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}"
                    class="avatar" />
            </div>
        @endif
        <div class="data-user">
            <a href="{{ route('user.profile', ['id' => $image->user_id]) }}">
                {{ $image->user->name . ' ' . $image->user->surname }}
                <span class="nickname">
                    {{ ' | @' . $image->user->nick }}
                </span>
            </a>
        </div>
    </div>

    <div class="card-body">
    <a href="{{ route('image.detail', ['id' => $image->id]) }}">
        <div class="image-container">
            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt="" />
        </div>
    </div>
    </a>
    <div class="description">
        <span class="nickname">{{ '@' . $image->user->nick }} </span>
        <span class="nickname date">{{ ' | ' . \FormatTime::LongTimeFilter($image->created_at) }}</span>
        <p>{{ $image->description }}</p>
    </div>
    <div>
        <div class="likes">
            <div>
                <?php $user_like = false ?>
                <!--comprobar si el usuario le dio like a la imagen-->
                @foreach ($image->likes as $like)
                    @if ($like->user->id == Auth::user()->id)
                        <?php $user_like = true ?>
                    @endif
                @endforeach

                @if ($user_like)
                    <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}" class="btn-like" />
                @else
                    <img src="{{ asset('img/heart-black.png') }}" data-id="{{ $image->id }}" class="btn-dislike" />
                @endif
                <span class="number-likes" id ="image-{{ $image->id }}">{{ count($image->likes) }}</span>
            </div>
        </div>
        <div class="comments">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn btn-sm btn-warning btn-comments">
                Comentarios ({{ count($image->comments) }})
            </a>
        </div>
        
    </div>
</div>