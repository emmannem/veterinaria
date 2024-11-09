{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <!-- Aquí puedes agregar CSS de Bootstrap, Tailwind o el que prefieras -->
</head>

<body>
    <header>
        <h1>Veterinaria XYZ</h1>
        <!-- Navegación u otro contenido común -->
        @include('partials.nav')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 Veterinaria XYZ</p>
    </footer>
</body>

</html>