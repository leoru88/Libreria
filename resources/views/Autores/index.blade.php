@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Listado de Autores</h2>

    <div class="table-responsive">
        <table id="table-autores" class="table mt-3">
            <thead>
                <tr>
                    <th data-column="nombre_completo">Nombre Completo</th>
                    <th data-column="fecha_nacimiento">Fecha de Nacimiento</th>
                    <th data-column="lugar_nacimiento">Lugar de Nacimiento</th>
                    <th data-column="resumen_personal">Resumen Personal</th>
                    <th data-column="bibliografia">Bibliografía</th>
                    <th data-column="email">E-mail</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($autores as $autor)
                <tr>
                    <td>{{ $autor->nombre_completo }}</td>
                    <td>{{ $autor->fecha_nacimiento }}</td>
                    <td>{{ $autor->lugar_nacimiento }}</td>
                    <td>{{ $autor->resumen_personal }}</td>
                    <td>
                        @foreach ($autor->libros as $libro)
                        {{ $libro->titulo }}<br>
                        @endforeach
                    </td>
                    <td>{{ $autor->email }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url("/autores/{$autor->id}/edit") }}" class="btn btn-warning">Editar</a>
                            <form action="{{ url("/autores/{$autor->id}") }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay autores disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <style>
        footer {
            background-color: #808080;
            color: #fff;
            padding: 2rem 0;
            text-align: center;
        }

        body {
            background-image: url(' https://fanfan.es/wp-content/uploads/2019/11/Content-Writing-2.0-2.jpg');
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
            const table = document.getElementById('table-autores');
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