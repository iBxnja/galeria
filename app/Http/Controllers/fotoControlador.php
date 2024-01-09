<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class fotoControlador extends Controller
{
    
    public function index(){

        $imagenes = new Foto();
        $aImagenes = $imagenes->obtenerTodos();

        return view('fotos', compact('aImagenes'));
    }


    public function guardar(Request $request)
    {
        #validamos si la imagen existe
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        #sabias que la request trae un file?
        if ($request->hasFile('file')) {
            #encierro la imagen en una variable
            $imagen = $request->file('file');
            #encierro la ruta en una variable
            $urlImagen = 'imagenes/';
            #creo el nombre de la imagen
            $nombreImagen = time() . '-' . $imagen->getClientOriginalName();
            
            #intenta esto
            try {
                #subo la imagen
                $subirImagen = $imagen->move($urlImagen, $nombreImagen);
                
                // Uso Eloquent para crear y guardar el modelo
                Foto::create([
                    'imagen' => $urlImagen . $nombreImagen,
                ]);
                // si se cumple
                return view('bien');
            } catch (\Exception $e) {
                // mandame aca si no se puede
                return view('error');
            }
        } else {
                // llevame a esta vista si no se sube ningun archivo
                return view('error');
        }
    }

    public function eliminar($id){

        $imagen = Foto::find($id);

        if($imagen){
            $imagen->eliminar();
            return view('bien');
        }else{
            return view('error');
        }

    }

}
