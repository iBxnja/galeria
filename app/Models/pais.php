<?php

#nombre del espacio
namespace App\Models;
#base de datos
use Illuminate\Support\Facades\DB;
#metodos y propiedades para interactuar con la base de datos
use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table = 'paises';
    protected $primaryKey = 'idPais';
    public $timestamps = false;

    protected $fillable = [
        'idPais', 'nombre',
    ];

    protected $hidden = [];

    #--------------------------------------------------------------------------------------
    public function cargarDesdeRequest($request)
    {
        $this->idPais = $request->input('idPais') != "0" ? $request->input('idPais') : $this->idPais;
        $this->nombre = $request->input('txtNombrePais');
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function obtenerTodos(){
        #crear query(consulta) en una variable
        $sql = "SELECT idPais,
                        nombre
                FROM paises";
        #dar retorno de lo que  viene de la bbdd, seleccioname la query($sql)
        $lstRetorno = DB::select($sql);
        #retorname el retorno
        return $lstRetorno;
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function guardar(){
        DB::table('paises')
            ->where('idPais', $this->idPais)
            ->update(array(
                'nombre' => $this->nombre,
        ));
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function eliminar(){
        $sql = "DELETE FROM paises WHERE idPais=?";
        $affected = DB::delete($sql,[$this->idPais]);
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function insertar(){
        $sql = 'INSERT INTO paises
        (
            nombre
            ) VALUES (?)';
        $result = DB::insert($sql, [
            $this->nombre
        ]);
        #DB::getPdo()->lastInsertId() en Laravel se utiliza para obtener el último ID 
        #insertado en la base de datos después de realizar una operación de inserción 
        #en una tabla con una columna autoincremental.
        return $this->idPais = DB::getPdo()->lastInsertId();
    }
    #--------------------------------------------------------------------------------------

}
