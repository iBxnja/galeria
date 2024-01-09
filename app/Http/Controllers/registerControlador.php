<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class registerControlador extends Controller
{
    public function create(){


        
        return view('register');
    }

    public function store(){
        #validacion
        #validación de los datos de la solicitud antes de procesarlos
        #Si alguno de estos criterios de validación no se cumple, Laravel
        #devolverá automáticamente una respuesta de error con los detalles
        #de la validación al usuario, impidiendo que los datos incorrectos
        #avancen al siguiente paso del flujo de trabajo.
        $this->validate(request(),[
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed',
        ]);


        #Creo un nuevo usuario utilizando el modelo User y el método create.
        #Los datos del usuario se toman de la solicitud
        #(request(['name', 'email', 'password'])), que ya ha pasado la validación.
        $user = User::create(request(['name', 'email', 'password']));

        #Esto es útil para evitar que el usuario tenga que iniciar sesión
        #manualmente después de registrarse.
        auth()->login($user);

        #redirigo al usuario a la ruta
        return redirect()->to('/galeria')->with('success', '¡Registro exitoso! Bienvenido a tu galería.');
    }





}
