<?php

#nombre del espacio
namespace App\Models;
#base de datos
use Illuminate\Support\Facades\DB;
#metodos y propiedades para interactuar con la base de datos
use Illuminate\Database\Eloquent\Model;

class persona extends Model {

    protected $table = 'personas';
    protected $primaryKey = 'idPersona';
    public $timestamps = false;

    protected $fillable = [
        'idPersona', 'nombre', 'apellido', 'paisOrigen',
    ];

    protected $hidden = [];


    #--------------------------------------------------------------------------------------
    public function cargarDesdeRequest($request)
    {
        $this->idCultura = $request->input('id') != "0" ? $request->input('id') : $this->idCultura;
        $this->nombre = $request->input('txtNombrePersona');
        $this->apellido = $request->input('txtApellidoPersona');
        $this->paisOrigen = $request->input('txtPaisPersona');
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function obtenerTodos(){
        #crear query(consulta) en una variable
        $sql = "SELECT 
                idPersona,
                nombre,
                apellido,
                paisOrigen
                FROM personas";
        #dar retorno de lo que viene de la bbdd, seleccioname la query($sql)
        $lstRetorno = DB::select($sql); 
        #retorname el retorno
        return $lstRetorno;
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function guardar(){
        #seleccionar tabla
        DB::table('culturas')
        #donde id
        ->where('idPersona', $this->idPersona)
        #update array que tiene los siguentes datos
        ->update(array(
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'paisOrigen' => $this->paisOrigen,
        ));
    }
    #--------------------------------------------------------------------------------------




    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM personas WHERE idPersona=?";
        $affected = DB::delete($sql, [$this->idPersona]);
    }
    #--------------------------------------------------------------------------------------



    #--------------------------------------------------------------------------------------
    public function insertar(){
        #crear query(consulta) en una variable
        $sql = "INSERT INTO personas (
                    nombre,
                    apellido,
                    paisOrigen
                    ) VALUES (?, ?, ?);";
        $result = DB::insert($sql,[
                    $this->nombre,
                    $this->apellido,
                    $this->paisOrigen
                    ]);
        #DB::getPdo()->lastInsertId() en Laravel se utiliza para obtener el último ID 
        #insertado en la base de datos después de realizar una operación de inserción 
        #en una tabla con una columna autoincremental.
        return $this->idPersona = DB::getPdo()->lastInsertId();
    }
    #--------------------------------------------------------------------------------------
}
