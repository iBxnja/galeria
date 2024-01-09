<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans bg-gray-100 h-screen flex flex-col">

    <!-- Header -->
    @include('header')

    <!-- Main Content -->
    <main class="flex-grow flex">
        
        <!-- Aside -->
        @include('aside')

        <!-- Section -->
        <section class="flex-1 bg-gray-300 flex justify-center items-center flex-wrap">
            
        </section>
    </main>

    <!-- Footer -->
    {{-- <footer class="bg-gray-300 p-4 mt-4">
        <p class="text-center text-gray-600">© 2023 Mi Página con Tailwind</p>
    </footer> --}}

</body>
</html>
