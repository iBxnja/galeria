<footer class="
cel:text-center cel:w-full
footer text-white flex items-center justify-center h-20 bottom-0 w-full">
    @if(auth()->check())
    <li class="mr-10 ml-6 text-sm"><a href="/galeria/culturas">Culturas</a></li>
    <li class="mr-10 ml-6 text-sm"><a href="/galeria/fotos">Fotos</a></li>
    <li class="mr-10 ml-6 text-sm"><a href="/galeria/lugares">Lugares</a></li>
    <li class="mr-10 ml-6 text-sm"><a href="/galeria/paises">Paises</a></li>
    <li class="mr-10 ml-6 text-sm"><a href="/galeria/personas">Personas</a></li>
    @endif
</footer>