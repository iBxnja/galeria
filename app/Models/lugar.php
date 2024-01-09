<?php

#nombre del espacio
namespace App\Models;
#base de datos
use Illuminate\Support\Facades\DB;
#metodos y propiedades para interactuar con la base de datos
use Illuminate\Database\Eloquent\Model;

class lugar extends Model
{
    protected $table = 'lugares';
    protected $primaryKey = 'idLugar';
    public $timestamps = false;

    protected $fillable = [
        'idLugar', 'nombreLugar', 'pais',
    ];

    protected $hidden = [];


    #--------------------------------------------------------------------------------------
    public function cargarDesdeRequest($request)
    {
        $this->idLugar = $request->input('id') != "0" ? $request->input('id') : $this->idLugar;
        $this->nombreLugar = $request->input('txtNombre');
        $this->pais = $request->input('txtPais');
    }
    #--------------------------------------------------------------------------------------


    
    #--------------------------------------------------------------------------------------
    public function obtenerTodos(){
        #crear query(consulta) en una variable
        $sql = "SELECT idLugar,
                        nombreLugar,
                        pais
                FROM lugares";
        #dar retorno de lo que  viene de la bbdd, seleccioname la query($sql)
        $lstRetorno = DB::select($sql);
        #retorname el retorno
        return $lstRetorno;
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function guardar(){
        DB::table('lugares')
            ->where('idLugar', $this->idLugar)
            ->update(array(
                'nombreLugar' => $this->nombreLugar,
                'pais' => $this->pais,
        ));
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function eliminar(){
        $sql = "DELETE FROM lugares WHERE idLugar=?";
        $affected = DB::delete($sql,[$this->idLugar]);
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function insertar(){
        $sql = 'INSERT INTO lugares
        (
            nombreLugar,
            pais
            ) VALUES (?, ?)';
        $result = DB::insert($sql, [
            $this->nombreLugar,
            $this->pais
        ]);
        #DB::getPdo()->lastInsertId() en Laravel se utiliza para obtener el último ID 
        #insertado en la base de datos después de realizar una operación de inserción 
        #en una tabla con una columna autoincremental.
        return $this->idLugar = DB::getPdo()->lastInsertId();
    }
    #--------------------------------------------------------------------------------------

}
