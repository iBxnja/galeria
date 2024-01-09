<?php

namespace App\Http\Controllers;

use App\Models\persona;
use Illuminate\Http\Request;

class personaControlador extends Controller
{
    public function index(){
        $titulo = "Personas";
        #inicializo la entidad
        $persona = new Persona();
        #accedo al metodo
        $aPersona = $persona->obtenerTodos();


        #lo envío a la vista    y mando por compact la variable
        return view('personas', compact('aPersona'));
    }

    public function guardar(Request $request){
        $entidad = new Persona();
        $entidad->cargarDesdeRequest($request);

        if(!empty($entidad->nombre == '' && $entidad->apellido == '' && $entidad->paisOrigen == '')){
            return view('error');
        } else {
            if ($_REQUEST["id"] > 0) {
                $entidad->guardar();
            }else{
                $entidad->insertar();

            }
            return view('bien');
        }
    }

    public function eliminar($id){

        $persona = Persona::find($id);

        if($persona){
            $persona->eliminar();
            return view('bien');
        }else{
            return view('error');
        }

    }


}