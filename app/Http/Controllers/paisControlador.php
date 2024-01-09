<?php

namespace App\Http\Controllers;

use App\Models\pais;
use Illuminate\Http\Request;

class paisControlador extends Controller
{
    public function index(){
        $titulo = "Paises";
        $pais = new Pais();
        $aPaises = $pais->obtenerTodos();
        return view('paises', compact('aPaises', 'titulo'));
    }


    public function guardar(Request $request){
        #inicializo la entidad
        $entidad = new Pais();
        #cargo los datos por el metodo 
        $entidad->cargarDesdeRequest($request);


        #si nombre viene vacio
        if ($entidad->nombre == "" ) {
            #retorname aca
            return view('error');
        #sino
        } else { 
            #si el input hidden id es mayor a 0
            if ($_POST["id"] > 0) {
                #esto
                $entidad->guardar();
                #sino esto
            } else {
                $entidad->insertar();
            }
            #entonces el nuevo id via post es igual a $entidad->idcultura
            $_POST["id"] = $entidad->idPais;
            #retorname aca
            return view('bien');
        } 
    }

    public function eliminar($id){

        $pais = Pais::find($id);

        if($pais){
            $pais->eliminar();
            return view('bien');
        }else{
            return view('error');
        }

    }


}
