<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    use HasFactory;

    protected $table = 'personas';
    public $timestamps = false;

    protected $fillable = [
        'idPersona', 'nombre', "apellido", "paisOrigen",
    ];

    protected $hidden = [

    ];



    #----------------------------------------------------------------------
    public function cargarDesdeRequest($request){

    }
    #----------------------------------------------------------------------


    #----------------------------------------------------------------------
    public function obtenerTodos(){
        //consulta hacia la base de datos
        $sql= "SELECT 
        idPersona,
        nombre,
        apellido,
        paisOrigen
        from personas ORDER BY nombre";
        #necesito un retorno
        $lstRetorno = DB::select($sql);
        #devuelvo lo que me trae
        return $lstRetorno;
    }
    #----------------------------------------------------------------------


    #----------------------------------------------------------------------
    public function guardar(){
        DB::table('personas')
        ->where('idPersonas', $this->idPersonas)
        ->update(array(
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'paisOrigen' => $this->paisOrigen,
        ));
    }
    #----------------------------------------------------------------------


    #----------------------------------------------------------------------
    public function eliminar(){
        $sql = "DELETE FROM personas WHERE idPersona=?";
        $affected = DB::delete($sql,[$this->idPersona]);
    }
    #----------------------------------------------------------------------


    #----------------------------------------------------------------------
    public function insertar(){
        $sql = "INSERT INTO 
        personas
        (nombre,apellido,paisOrigen)
        VALUES 
        (?, ?, ?);";
        $result = DB::insert($sql,[
            $this->nombre
        ]);
        #cuando ejecutas DB::getPdo()->lastInsertId(), estás obteniendo el 
        #ID del último registro que insertaste en la base de datos utilizando
        #la conexión de base de datos actual. 
        return $this->idPersona = DB::getPdo()->lastInsertId();
    }
    #----------------------------------------------------------------------


}
