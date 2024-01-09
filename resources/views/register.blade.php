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
    <main class="w-full h-screen flex items-center justify-center">
        <section class="w-full h-screen grid place-items-center register">
            <div class="
            cel:w-5/6
            w-4/6 h-5/6 bg-white flex flex-col items-center justify-center border-4 border-black">
                <form action="" method="POST" class="
                cel:w-11/12
                w-2/4 h-4/5 flex items-center justify-center flex-col ">
                    @csrf
                    <h2 class="
                    cel:text-3xl
                    text-5xl font-bold text-red-900 mb-5">Register</h2>
                    <div class="
                    cel:m-0
                    m-2 flex flex-col items-center justify-center w-5/6">
                        <label for="name" class="cel:text-sm">Name</label>
                        <input type="text" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                        placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" name="name" id="name">
                    </div>
                    <div class="
                    cel:m-0
                    m-2 flex flex-col items-center justify-center w-5/6">
                        <label for="email" class="cel:text-sm">Email</label>
                        <input type="email" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                        placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" name="email" id="email">
                    </div>
                    <div class="
                    cel:m-0
                    m-2 flex flex-col items-center justify-center w-5/6">
                        <label for="password" class="cel:text-sm">Contraseña</label>
                        <input type="password" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                        placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" name="password" id="password">
                    </div>
                    <div class="
                    cel:m-0
                    m-2 flex flex-col items-center justify-center w-5/6">
                        <label for="password_confirmation" class="cel:text-sm">Confirmar Contraseña</label>
                        <input type="password" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                        placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="">
                        <span class=" cel:text-sm">¿Ya tienes cuenta? </span><a href="{{route('login.index')}}" class="text-green-900 cel:text-sm">Entrar.</a>
                    </div>
                    <button type="submit" class="
                    cel:w-32 cel:text-sm
                    rounded-md register w-40 text-lg
                    text-white font-semibold p-2 my-3">Registrar</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>