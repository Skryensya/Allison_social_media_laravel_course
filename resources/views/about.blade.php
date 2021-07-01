@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>About</h1></div>

                    <div class="card-body">
                        <p>Este es un proyecto realizado con Laravel 8.40.0 que funciona como un Clon de Instagram, Elaborado por <a href="https://redsocial.allisonjpb.com/perfil/1">Allison Peña</a>  como parte de <a href="https://www.udemy.com/course/master-en-php-sql-poo-mvc-laravel-symfony-4-wordpress/" class="normalink">este curso</a></p>
                        <p>Link al repositorio: <a href="https://github.com/Skryensya/Allison_social_media_laravel_course" class="normalink">Aquí</a></p>
                        <hr/>
                        <h2>La aplicacion puede realizar las siguientes funciones:</h2>
                        <ul class="classicul">
                            <li>Registrarse en la plataforma</li>
                            <li>Ingresar a la plataforma con sus credenciales</li>
                            <li>Editar la informacion de su perfil</li>
                            <li>Agregar una foto a su perfil</li>
                            <li>Publicar fotos/post (solo usuarios autorizados desde el backend)</li>
                            <li>Editar los post</li>
                            <li>Dar like a los post</li>
                            <li>Dar dislike a los post los cuales previamente se les había dado like</li>
                            <li>Comentar en los posts</li>
                            <li>Eliminar comentarios (tuyos que hayan hecho en tu post) </li>
                            <li>Entrar en el perfil de los  demás usuarios</li>
                            <li>Ver un listado de todos los usuarios registrados</li>
                            <li>Ver un listado de todos los post a los que ha dado like</li>
                        </ul>
                        <hr/>
                        <h2>Contacto</h2>
                        <ul class="classicul"> <li>Allison.jpb@gmail.com</li> </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection