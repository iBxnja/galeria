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
            cel:w-5/6 cel:text-center header
            w-4/6 h-full bg-white flex flex-col justify-center items-center mt-20 shadow-gray-400 shadow-md p-10">
                <label for="txtNombre" class="text-2xl text-white">Agregar lugares visitados</label>
                <input type="text" name="txtNombre" id="txtNombre" class="cel:h-8 cel:w-11/12 w-5/6 mt-7 bg-white h-10 text-black text-center rounded-full" placeholder="Nombre del lugar">
                <input type="text" name="txtPais" id="txtPais" class="cel:h-8 cel:w-11/12 w-5/6 mt-7 bg-white h-10 text-black text-center rounded-full" placeholder="País situado">
                <input type="hidden" name="id" value="{{ isset($entidad) ? $entidad->idLugar : '' }}">
                <button type="submit" name="btnAgregarLugar" class="mt-7 w-32 h-12 rounded-full bg-green-400 font-semibold shadow-gray-400 shadow-sm">Agregar</button>
            </div>
            <div class="
            cel:w-5/6
            w-4/6 h-full mt-20 mb-20 bg-white shadow-gray-400 shadow-md">
                <table class="bg-white w-full h-screen header">
                  <thead class="flex justify-center items-center">
                    <tr class="w-11/12 h-40 mt-10 bg-white flex items-center justify-center">
                      <th class="cel:text-lg text-3xl">Lista de personas conocidas</th>
                    </tr>
                  </thead>
                  <tbody class="flex flex-col justify-start items-center">
                    @foreach ($aLugares as $lugar)
                    <tr class="mt-10 mb-10 h-16 flex items-center justify-between w-11/12 cel:mt-5 cel:mb-5 text-center">
                      <td class="cel:text-sm cel:h-14 text-xl font-thin w-4/12 h-16 bg-white grid place-items-center">{{ $lugar->nombreLugar}}</td>
                      <td class="cel:text-sm cel:h-14 text-xl font-thin w-4/12 h-16 bg-white grid place-items-center">{{ $lugar->pais}}</td>
                      <td class="
                      cel:h-14
                      text-xl font-thin w-2/12 h-16 bg-white grid place-items-center">
                      <a href="{{ route('lugares.eliminar', ['id' => $lugar->idLugar]) }}" class="cel:text-base text-3xl" name="btnEliminarLugar"><i class="fa-solid fa-trash"></i>
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


