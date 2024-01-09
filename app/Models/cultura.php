<?php
#nombre del espacio
namespace App\Models;
#base de datos
use Illuminate\Support\Facades\DB;
#metodos y propiedades para interactuar con la base de datos
use Illuminate\Database\Eloquent\Model;

class cultura extends Model
{    

    protected $table = 'culturas';
    protected $primaryKey = 'idCultura';
    public $timestamps = false;

    protected $fillable = [
        'idCultura', 'nombre',
    ];

    protected $hidden = [];



    #--------------------------------------------------------------------------------------
    public function cargarDesdeRequest($request)
    {
        $this->idCultura = $request->input('id') != "0" ? $request->input('id') : $this->idCultura;
        $this->nombre = $request->input('txtNombreCultura');
    }
    #--------------------------------------------------------------------------------------


        public function obtenerPorId($idCultura)
    {
        $sql = "SELECT
                idCultura,
                nombre
                FROM culturas 
                WHERE idCultura = ?";
                
        $lstRetorno = DB::select($sql, [$idCultura]);

        if (count($lstRetorno) > 0) {
            $this->idCultura = $lstRetorno[0]->idCultura;
            $this->nombre = $lstRetorno[0]->nombre;
            return $this;
        }
        
        return null;
    }




    #--------------------------------------------------------------------------------------
    public function obtenerTodos(){
        #crear query(consulta) en una variable
        $sql = "SELECT 
                idCultura,
                nombre
                FROM culturas";
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
            ->where('idCultura', $this->idCultura)
            #update array que tiene los siguientes datos
            ->update(array(
                'nombre' => $this->nombre,
            ));
    }
    #--------------------------------------------------------------------------------------


    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM culturas WHERE idCultura=?";

        $affected = DB::delete($sql, [$this->idCultura]);
    }
    #--------------------------------------------------------------------------------------


    #--------------------------------------------------------------------------------------
    public function insertar(){
        #crear query(consulta) en una variable
        $sql = "INSERT INTO culturas (
                    nombre
                    ) VALUES (?);";
        $result = DB::insert($sql,[
                    $this->nombre
                    ]);
        #DB::getPdo()->lastInsertId() en Laravel se utiliza para obtener el último ID 
        #insertado en la base de datos después de realizar una operación de inserción 
        #en una tabla con una columna autoincremental.
        return $this->idCultura = DB::getPdo()->lastInsertId();
    }
    #--------------------------------------------------------------------------------------


}




