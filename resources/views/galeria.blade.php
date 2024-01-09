<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $titulo ;?> </title>
    <script src="https://kit.fontawesome.com/5aac904b55.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    @include('header')
    
    <main class="
    cel:h-full
    w-full h-screen galeria flex flex-wrap justify-center items-center">
        <a href="/galeria/culturas" class="
        cel:mt-10 cel:mb-10 cel:text-base
        text-white text-xl uppercase grid place-items-center rounded-3xl w-72 h-40 bg-red-500 ml-10 mr-10 shadow-sm shadow-black">Culturas descubiertas</a>
        <a href="/galeria/fotos" class="
        cel:mt-10 cel:mb-10 cel:text-base
        text-white text-xl uppercase grid place-items-center rounded-3xl w-72 h-40 bg-blue-500 ml-10 mr-10 shadow-sm shadow-black">Agregar fotos</a>
        <a href="/galeria/lugares" class="
        cel:mt-10 cel:mb-10 cel:text-base
        text-white text-xl uppercase grid place-items-center rounded-3xl w-72 h-40 bg-yellow-500 ml-10 mr-10 shadow-sm shadow-black">Lugares visitados</a>
        <a href="/galeria/paises" class="
        cel:mt-10 cel:mb-10 cel:text-base
        text-white text-xl uppercase grid place-items-center rounded-3xl w-72 h-40 bg-green-500 ml-10 mr-10 shadow-sm shadow-black">Paises recorridos</a>
        <a href="/galeria/personas" class="
        cel:mt-10 cel:mb-10 cel:text-base
        text-white text-xl uppercase grid place-items-center rounded-3xl w-72 h-40 bg-pink-700 ml-10 mr-10 shadow-sm shadow-black ">Personas conocidas</a>
    </main>
    @include('footer')
</body>




</html>
