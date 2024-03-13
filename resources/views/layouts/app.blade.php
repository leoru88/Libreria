<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://images5.alphacoders.com/394/394862.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        footer {
            color: #fff;
            padding: 2rem 0;
            text-align: center;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Catálogo de Libros</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/libros') }}">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/autores') }}">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/libros/Organize') }}">Biblioteca</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('welcome')

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

    <footer class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
            <div class="social-links mb-4">
                <a href="https://www.linkedin.com/in/leonardo-rodriguez-developer/" target="_blank" class="social-link" style="margin-right: 10px;">
                    <i class="fab fa-linkedin fa-lg" style="color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-size: 24px;"></i>
                </a>
                <a href="https://www.instagram.com/leoru88/" target="_blank" class="social-link" style="margin-right: 10px;">
                    <i class="fab fa-instagram fa-lg" style="color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-size: 24px;"></i>
                </a>
                <a href="https://www.facebook.com/leonardo.rodriguez.uzcategui/" target="_blank" class="social-link">
                    <i class="fab fa-facebook-f fa-lg" style="color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-size: 24px;"></i>
                </a>
            </div>
                <p class="mb-0">© 2022 Ing. Leonardo Rodríguez. <br> Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</html>