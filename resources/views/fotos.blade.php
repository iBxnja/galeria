<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fotos</title>
    <script src="https://kit.fontawesome.com/5aac904b55.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    @include('header')
    <main class="todos grid place-items-center">
        <form method="POST" class="w-full h-full flex items-center justify-center flex-col" enctype="multipart/form-data">
            @csrf
            <div class="w-4/6 h-full header flex flex-col justify-center items-center mt-20 shadow-gray-400 shadow-md p-10">
                <label for="file" class="text-2xl text-white mb-5">Agregar fotos</label>
                <input type="file" accept=".jpg, .png, .jpeg" name="file" id="file" class="" required>
                <input type="hidden" name="id" value="{{ isset($entidad) ? $aImagenes->idImagen : '' }}">
                <button type="submit" name="btnAgregarCultura" class="mt-7 w-32 h-12 rounded-full bg-white text-black font-semibold shadow-gray-400 shadow-sm">AGREGAR</button>
            </div>
        </form>
        <form method="POST" class="w-full h-full flex items-center justify-center flex-col">
            @csrf
            <div class="w-4/6 h-full mt-20 mb-20 bg-white shadow-gray-500 shadow-lg">
                <table class="header w-full h-screen">
                    <thead class="flex justify-center items-center">
                        <tr class="w-11/12 h-40 mt-10 bg-white flex items-center justify-center shadow-gray-500 shadow-md">
                            <th class="text-3xl">Galeria de fotos</th>
                        </tr>
                    </thead>
                    <tbody class="flex flex-col justify-start items-center">
                        @foreach ($aImagenes as $imagenes)
                        <tr class="w-11/12 flex justify-center items-center mt-10 mb-10 ">

                            <td class="flex justify-center items-center flex-col bg-white shadow-md shadow-black">
                                <img src="{{asset($imagenes->imagen)}}" alt="asd" class="border-8 border-white w-72 h-72">
                                <span class="cel:text-base text-xl w-72 flex items-center justify-center h-16"><a href="{{ route('fotos.eliminar', ['id' => $imagenes->idImagen]) }}" name="btnEliminarImagen" class="w-56 h-14 todos flex items-center justify-center mb-1 rounded-full text-black">Eliminar Imagen</a></span>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </main>
    @include('footer')
</body>
</html>


