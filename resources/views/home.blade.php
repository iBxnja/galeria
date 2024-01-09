<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- <header class="bg-gray-800 flex items-center justify-center text-white h-20 top-0 w-full">
        <nav class="w-56 h-20 flex items-center justify-center">
            <ul class="flex items-center justify-center">
            @if(auth()->check())
                <p>Hola {{ auth()->user()->name }}</p>
                <li class=""><a href="{{route('login.destroy')}}">logout</a></li>

                @else
                <li class="mr-40 ml-40 w-40 h-14 bg-red-500 grid place-items-center rounded-full"><a href="{{route('login.index')}}">login</a></li>
                <li class="mr-40 ml-40 w-40 h-14 bg-red-500 grid place-items-center rounded-full"><a href="{{route('register.index')}}">register</a></li>
                @endif
            </ul>
        </nav>
    </header> --}}
    <main>
        <section class="cel:w-full cel:h-screen cel:grid cel:place-items-center cel:home

        w-full h-screen grid place-items-center home">
            <div class="cel:w-5/6 cel:h-5/6 cel:bg-white cel:flex cel:flex-col cel:items-center cel:justify-center cel:border-4 cel:border-black
            w-4/6 h-5/6 bg-white flex flex-col items-center justify-center border-4 border-black">
                <div class="cel:text-center cel:flex cel:flex-col cel:items-center cel:justify-center
                flex flex-col items-center justify-center">
                    <h2 class="cel:text-3xl cel:font-bold cel:text-blue-950 
                    text-5xl font-bold text-blue-950">¡Bienvenido a la galeria!</h2>
                    <h2 class="cel:mt-5 cel:text-xl cel:font-thin
                    mt-5 text-2xl font-thin">¿Que deseas hacer?</h2>
                </div>
                <div class="cel:flex cel:flex-col cel:items-center cel:justify-center cel:mt-5
                flex flex-col items-center justify-center mt-14">
                                    <!--Llevame a esta tura-->
                    <a href="{{route('login.index')}}" class="cel:w-48 cel:h-14 home cel:text-white cel:m-5 cel:grid cel:place-items-center cel:uppercase cel:rounded-full cel:border-2 cel:shadow-black cel:shadow sm cel:border-blue-950
                    w-96 h-14 home text-white m-5 grid place-items-center uppercase rounded-full border-2 shadow-black shadow-sm border-blue-950
                        ">login</a> 
                    <a href="{{route('register.index')}}" class="
                    w-96 h-14 home text-white m-5 grid place-items-center uppercase rounded-full border-2 shadow-black shadow-sm border-blue-950
                    cel:w-48 cel:h-14 home cel:text-white cel:m-5 cel:grid cel:place-items-center cel:uppercase cel:rounded-full cel:border-2 cel:shadow-black cel:shadow sm cel:border-blue-950">register</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>