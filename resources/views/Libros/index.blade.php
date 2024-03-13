@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Listado de Libros</h2>
    <a href="{{ url('/libros/create') }}" class="btn btn-primary mb-3">Agregar Libro</a>
    <div class="table-responsive">
        <table id="table-libros" class="table mt-3">
            <thead>
                <tr>
                    <th data-column="titulo">Título</th>
                    <th data-column="autor">Autor</th>
                    <th data-column="anio_publicacion">Fecha de Publicación</th>
                    <th data-column="genero">Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->fecha_publicacion }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url("/libros/{$libro->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <form action="{{ url("/libros/{$libro->id}") }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay libros disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="app">
        <Home></Home>
    </div>

    <div id="act">
        <Act></Act>
    </div>

    <style>
        footer {
            background-color: #808080;
            color: #fff;
            padding: 2rem 0;
            text-align: center;
        }

        body {
            background-image: url('https://img.impactotic.co/wp-content/uploads/2021/11/05121134/Portada-tiger-libros-desarrollo-personal-1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            color: #333;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th[data-column] {
            cursor: pointer;
        }

        tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .btn {
            border-radius: 5px;
        }

        .btn-group {
            display: inline-flex;
            gap: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('table-libros');
            const tbody = table.querySelector('tbody');
            const ths = table.querySelectorAll('th[data-column]');

            ths.forEach(th => {
                th.addEventListener('click', () => {
                    sortTable(th.getAttribute('data-column'));
                });
            });

            function sortTable(column) {
                const rows = Array.from(tbody.querySelectorAll('tr'));

                rows.sort((a, b) => {
                    const aValue = a.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();
                    const bValue = b.querySelector(`td:nth-child(${getColumnIndex(column)})`).textContent.trim();
                    if (!isNaN(aValue) && !isNaN(bValue)) {
                        return aValue - bValue;
                    } else {
                        return aValue.localeCompare(bValue, 'es', {
                            sensitivity: 'base'
                        });
                    }
                });

                tbody.innerHTML = '';
                rows.forEach(row => tbody.appendChild(row));
            }

            function getColumnIndex(column) {
                const headers = Array.from(table.querySelectorAll('th'));
                return headers.findIndex(th => th.getAttribute('data-column') === column) + 1;
            }
        });
    </script>
    @endsection