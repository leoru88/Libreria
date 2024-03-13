@extends('layouts.app')

@section('welcome')
<div class="container mt-4" style="text-align: center">
    <div class="jumbotron">
        <h1 class="display-4">¡Bienvenido a nuestro catálogo de libros!</h1>
        <p class="lead">Explora nuestra colección de libros y descubre nuevas historias que te cautivarán.</p>
        <hr class="my-4">
        <p>¿Listo para comenzar tu aventura literaria? ¡Explora nuestro catálogo ahora!</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/libros') }}" role="button">Explorar</a>
    </div>
</div>
@endsection