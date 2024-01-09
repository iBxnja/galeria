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
          <div class="header
          cel:w-5/6 cel:text-center
          w-4/6 h-full bg-white flex flex-col justify-center items-center mt-20 shadow-gray-400 shadow-md p-10">
            <label for="txtNombrePersona" class="cel:text-base text-2xl text-white">Agregar personas conocidas</label>
            <input type="text" name="txtNombrePersona" id="txtNombrePersona" class="
            cel:h-8 cel:w-11/12
            w-5/6 mt-7 bg-white h-10 text-black text-center rounded-full cel:text-sm" placeholder="Nombre de la persona">
            <input type="text" name="txtApellidoPersona" id="txtApellidoPersona" class="cel:h-8 cel:w-11/12 w-5/6 mt-7 bg-white h-10 text-black text-center rounded-full cel:text-sm" placeholder="Apellido de la persona">
            <input type="text" name="txtPaisPersona" id="txtPaisPersona" class="cel:h-8 cel:w-11/12 w-5/6 mt-7 bg-gwhite h-10 text-black text-center rounded-full cel:text-sm" placeholder="País de la persona">
            <input type="hidden" name="id" value="{{ isset($entidad) ? $entidad->idPersona : '' }}">
            <button type="submit" name="btnAgregarPersona" class="cel:w-32 mt-7 w-32 h-12 rounded-full bg-green-400 font-semibold shadow-gray-400 shadow-sm">AGREGAR</button>
        </div>
            <div class="
            cel:w-5/6
            w-4/6 h-full mt-20 mb-20 bg-white  shadow-gray-400 shadow-md">
                <table class="header w-full h-screen">
                  <thead class="flex justify-center items-center">
                    <tr class="cel:h-28 w-11/12 h-40 mt-10 bg-white flex items-center justify-center">
                      <th class="text-3xl cel:text-lg">Lista de personas conocidas</th>
                    </tr>
                  </thead>
                  <tbody class="flex flex-col justify-start items-center">
                    @foreach ($aPersona as $persona)
                    <tr class="mt-8 cel:text-sm mb-8 h-16 flex text-center items-center justify-between w-11/12">
                      <td class="cel:h-10 cel:text-xs text-xl font-thin w-3/12 h-16 bg-white grid place-items-center overflow-auto">{{ $persona->nombre}}</td>
                      <td class="cel:h-10 cel:text-xs text-xl font-thin w-3/12 h-16 bg-white grid place-items-center overflow-auto">{{ $persona->apellido}}</td>
                      <td class="cel:h-10 cel:text-xs text-xl font-thin w-3/12 h-16 bg-white grid place-items-center overflow-auto">{{ $persona->paisOrigen}}</td>
                      <td class="cel:h-10 cel:text-xs text-xl font-thin w-2/12 h-16 bg-white grid place-items-center">
                        <a href="{{ route('personas.eliminar', ['id' => $persona->idPersona]) }}" class="cel:text-base text-3xl" name="btnEliminarCultura"><i class="fa-solid fa-trash"></i>
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


