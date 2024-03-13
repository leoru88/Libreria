@extends('layouts.app')

@section('content')
<div class="container edit-container">
    <div class="edit-form-container">
        <h2>Editar Autor</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url("/autores/{$autor->id}") }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo', $autor->nombre_completo) }}">
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $autor->fecha_nacimiento) }}">
            </div>
            <div class="mb-3">
                <label for="lugar_nacimiento" class="form-label">País de Nacimiento</label>
                <select class="form-select" id="lugar_nacimiento" name="lugar_nacimiento">
                    @foreach($paises as $pais)
                    <option value="{{ $pais }}" {{ old('lugar_nacimiento', $autor->lugar_nacimiento) == $pais ? 'selected' : '' }}>{{ $pais }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="resumen_personal" class="form-label">Resumen Personal</label>
                <input type="text" class="form-control" id="resumen_personal" name="resumen_personal" value="{{ old('resumen_personal', $autor->resumen_personal) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $autor->email) }}">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Actualizar autor</button>
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
        $( "#fecha_nacimiento" ).datepicker({
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