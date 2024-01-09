<?php

#nombre del espacio
namespace App\Models;
#base de datos
use Illuminate\Support\Facades\DB;
#metodos y propiedades para interactuar con la base de datos
use Illuminate\Database\Eloquent\Model;

class foto extends Model{
    

    protected $table = 'Fotos';
    protected $primaryKey = 'idImagen';
    public $timestamps = false;

    protected $fillable = [
        'idImagen', 'imagen',
    ];

    protected $hidden = [];



    #--------------------------------------------------------------------------------------
    public function cargarDesdeRequest($request)
    {
        $this->idImagen = $request->input('id') != "0" ? $request->input('id') : $this->idImagen;
        $this->imagen = $request->input('txtFoto');
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function obtenerTodos(){
        #crear query(consulta) en una variable
        $sql = "SELECT 
                idImagen,
                imagen
                FROM fotos";
        #dar retorno de lo que viene de la bbdd, seleccioname la query($sql)
        $lstRetorno = DB::select($sql);
        #retorname el retorno
        return $lstRetorno;
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function guardar()
    {
        // Validar que el idImagen existe
        $foto = Foto::find($this->idImagen);
        if (!$foto) {
            // Manejar el caso donde el idImagen no existe
            return view('error');
        }
        // Validar y guardar la nueva imagen
        $foto->imagen = $this->imagen;
        $foto->save();
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM fotos WHERE idImagen=?";

        $affected = DB::delete($sql, [$this->idImagen]);
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function insertar(){
        #crear query(consulta) en una variable
        $sql = "INSERT INTO fotos (
                    imagen
                    ) VALUES (?);";
        $result = DB::insert($sql,[
                    $this->imagen
                    ]);
        #DB::getPdo()->lastInsertId() en Laravel se utiliza para obtener el último ID 
        #insertado en la base de datos después de realizar una operación de inserción 
        #en una tabla con una columna autoincremental.
        return $this->idImagen = DB::getPdo()->lastInsertId();
    }
    #--------------------------------------------------------------------------------------
}
