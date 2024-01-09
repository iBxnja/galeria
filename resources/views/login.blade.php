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
        <section class="w-full h-screen grid place-items-center login">
            <div class="
            cel:w-5/6
            w-4/6 h-5/6 bg-white flex flex-col items-center justify-center border-4 border-black">
                <form action="" method="POST" class="
                cel:w-11/12
                w-2/4 h-4/5 flex items-center justify-center flex-col">
                    @csrf
                    <h2 class="text-5xl font-bold text-green-900 mb-5
                    cel:text-3xl
                    ">Login</h2>
                    <div class="
                    cel:m-0
                    m-5 flex flex-col items-center justify-center w-5/6">
                        <label for="txtEmailLogin" class="text-xl cel:text-sm">Email</label>
                        <input type="email" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" placeholder="Email"
                        id="email" name="email">
                    </div>
                    <div class="
                    cel:m-0
                    m-5 flex flex-col items-center justify-center w-5/6">
                        <label for="txtContraseñaLogin" class="text-xl cel:text-sm">Contraseña</label>
                        <input type="password" class="
                        cel:h-8
                        text-center border border-gray-200 rounded-md bg-gray-200 w-full
                         placeholder-gray-900 p-2 my-2 focus:bg-white text-sm" placeholder="Password"
                        id="password" name="password">
                    </div>
                    <div class="
                    cel:m-0 text-center
                    mb-5">
                        <span class="text-sm">¿Todavia no tienes cuenta? </span><a href="{{route('register.index')}}" class="text-green-900 cel:text-sm">Registrate aca.</a>
                    </div>
                    @error('message')
                    <p>* Error</p>
                    @enderror
                    <button type="submit" class="
                    cel:w-32 cel:text-sm
                    rounded-md login w-40 text-lg
                    text-white font-semibold p-2 my-3">Entrar</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>