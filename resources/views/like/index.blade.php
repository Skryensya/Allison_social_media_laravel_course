@extends('layouts.app')
@php

@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Mis imagenes favoritas</h1>
                <hr>

                @foreach ($likes as $like)
                    <!--Mostrar tarjeta de imagen-->
                    
                    @include('includes.image', [ 'image' => $like->image ])
                @endforeach

                <!-- PAGINATION -->
                <div class="clear-fix"></div>
                {{ $likes->links() }}
            </div>
        </div>
    </div>
@endsection