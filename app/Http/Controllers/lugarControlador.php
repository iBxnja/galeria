<?php

namespace App\Http\Controllers;

use App\Models\lugar;
use Illuminate\Http\Request;

class lugarControlador extends Controller
{
    public function index(){

    #inicializo la entidad
    $lugar = new Lugar();
    $aLugares = $lugar->obtenerTodos();

    return view('lugares', compact('aLugares'));
    }

    public function guardar(Request $request){
        #inicializo la entidad
        $entidad = new Lugar();
        #cargo los datos por el metodo 
        $entidad->cargarDesdeRequest($request);


        #si nombre viene vacio
        if ($entidad->nombreLugar == "" && $entidad->pais == "") {
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
            $_POST["id"] = $entidad->idLugar;
            #retorname aca
            return view('bien');
        } 
    }

    public function eliminar($id){

        $lugar = Lugar::find($id);

        if($lugar){
            $lugar->eliminar();
            return view('bien');
        }else{
            return view('error');
        }

    }





}
