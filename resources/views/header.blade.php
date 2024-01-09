<header class="
cel:justify-center
header flex items-center justify-end text-white h-20 top-0 w-full">
    <ul class="
    cel:mr-0
    flex items-center justify-center mr-10">
        @if(auth()->check())
        <li class="mr-10 ml-6 overflow-auto text-sm">Hola {{ auth()->user()->name }}</li>
        @endif
        <li class="mr-10 ml-6 text-sm"><a href="/galeria">Inicio</a></li>
        @if(auth()->check())
        <li class="mr-6 ml-6 text-2xl"><a href="{{route('login.destroy')}}"><i class="fa-solid fa-door-open"></i></a></li>
        @endif
    </ul>
</header>