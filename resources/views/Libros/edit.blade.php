@extends('layouts.app')

@section('content')
<div class="container edit-container">
    <div class="edit-form-container">
        <h2>Editar Libro</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url("/libros/{$libro->id}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}">
            </div>
            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="text" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion', $libro->fecha_publicacion) }}">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero', $libro->genero) }}">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Agregar Libro</button>
                <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                history.replaceState(null, '', window.location.href);
            }
            form.classList.add('was-validated');
        }, false);
    });
</script>

<script>
    $(function() {
        $( "#fecha_publicacion" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:{{ date('Y') }}"
        });
    });
</script>

<style>
        
    .button-container {
        text-align: center;
    }


    .edit-container {
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .edit-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        filter: brightness(0.5);
    }

    .edit-form-container {
        position: relative;
        z-index: 2;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        margin: 20px auto;
    }

    .edit-form-container h2 {
        margin-bottom: 30px;
        text-align: center;
        color: #333;
    }

    .edit-form-container .form-label {
        color: #333;
    }

    .edit-form-container .form-control {
        border: 2px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        margin-bottom: 20px;
    }

    .edit-form-container .form-select {
        border: 2px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        margin-bottom: 20px;
        background-color: #fff;
    }

    .edit-form-container .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .edit-form-container .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }

    .edit-form-container .btn-primary,
    .edit-form-container .btn-secondary {
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .edit-form-container .btn-primary:hover,
    .edit-form-container .btn-secondary:hover {
        opacity: 0.8;
    }
</style>
@endsection