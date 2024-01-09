<?php
#nombre del espacio que le estamos dando
namespace App\Http\Controllers;

use App\Models\cultura;
use Illuminate\Http\Request;

class culturaControlador extends Controller
{
    //
    public function index(){
        $titulo = "Cultura";

        #inicializo la entidad
        $cultura = new Cultura();
        #aplico el metodo
        $aCultura = $cultura->obtenerTodos();

        #retorno a la vista     via compact envío el array
        return view('culturas', compact('aCultura', 'titulo', 'cultura'));


    }


    public function guardar(Request $request){
        $entidad = new Cultura();
        $entidad->cargarDesdeRequest($request);

        if(!empty($entidad->nombre == '')){
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
    #Cultura::find(
    # Este método se utiliza para buscar un registro en la tabla asociada
    #al modelo mediante su clave primaria. El argumento $id es el valor de
    #la clave primaria del registro que se está buscando.
    $cultura = Cultura::find($id);

    if ($cultura) {
        $cultura->eliminar();
        // Puedes redirigir a la página de lista de culturas u otra página después de la eliminación.
        return view('bien');
    } else {
        // Manejo de error si la cultura no se encuentra.
        return view('error');
    }
}
    


}