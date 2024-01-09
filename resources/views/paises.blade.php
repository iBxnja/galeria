<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $titulo;?></title>
    <script src="https://kit.fontawesome.com/5aac904b55.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    @include('header')
    <main class="todos grid place-items-center">
        <form method="POST" class="w-full h-full flex items-center justify-center flex-col">
            @csrf
            <div class="
            cel:w-5/6 cel:text-center
            w-4/6 h-full header flex flex-col justify-center items-center mt-20 shadow-gray-400 shadow-md p-10">
                <label for="txtNombreCultura" class="cel:text-base text-2xl text-white">Agregar cultura descubierta</label>
                <input type="text" name="txtNombreCultura" id="txtNombreCultura" class="
                cel:h-8 cel:w-11/12 cel:text-sm
                w-5/6 mt-7 bg-white shadow-gray-600 shadow-sm h-10 text-black text-center rounded-full" placeholder="Nombre del país">
                <input type="hidden" name="id" value="{{ isset($entidad) ? $entidad->idPais : '' }}">
                <button type="submit" name="btnAgregarPais" class="
                cel:w-32
                mt-7 w-32 h-12 rounded-full bg-white text-black font-semibold shadow-gray-400 shadow-sm">Agregar</button>
            </div>
        </form>
            <div class="
            cel:w-5/6
            w-4/6 h-full mt-20 mb-20 shadow-lg">
                <table class="header w-full h-screen mt-20">
                    <thead class="flex justify-center items-center">
                        <tr class="cel:h-28
                        w-11/12 h-40 mt-10 bg-white flex items-center justify-center shadow-gray-500 shadow-md">
                            <th class="text-3xl cel:text-lg">Lista de paises recorridos</th>
                        </tr>
                    </thead>
                    <tbody class="flex flex-col justify-start items-center">
                        @foreach ($aPaises as $pais)
                        <tr class="w-11/12 flex justify-between items-center mt-10 mb-10 cel:mt-5 cel:mb-5">
                            <td class="cel:h-10 text-base font-thin w-9/12 h-16 bg-white grid place-items-center shadow-gray-500 shadow-md"> {{ $pais->nombre}} </td>
                            <td class="cel:h-10 text-base font-thin w-2/12 h-16 bg-white grid place-items-center shadow-gray-500 shadow-md">
                                <a href="{{ route('paises.eliminar', ['id' => $pais->idPais]) }}" class="cel:text-base text-3xl" name="btnEliminarPais"><i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </main>
    @include('footer')
</body>
</html>


