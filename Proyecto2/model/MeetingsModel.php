<?php
require_once 'database/Mysql.php';
include 'entity/Acta.php';

class MeetingsModel {
    
    function __construct() {
        
    }
    
    public function addMeeting($titulo, $descri, $nombre) {
        $ano =date("Y");
        $mes= date("m");
        $dia = date("d");
        $fecha = $ano."-".$mes."-".$dia;
        try {   
            Mysql::open();
            $query = "insert into acta(titulo, descripcion, fecha, nombre) values ('$titulo', '$descri','$fecha','$nombre')";
            //$query = "call sp_addMeeting('$titulo', '$descri','$fecha','$nombre')";
            $result=Mysql::execute($query);
            
            if ($result) {
                Mysql::close();
                return "El acta se guardo corectamente";   
            }
            Mysql::close();
            return "El acta no se pudo guarda";
            
        } catch (Exception $exc) {
            return "el acta no se guardo. Error:".$exc;
        }
    }//addMetting
    
    public function getActa($fecha, $nombre) {
        if($nombre !=""){
            $query = "SELECT * FROM acta WHERE nombre like '%$nombre%'";
            //$query = "call sp_getActaNombre('%$nombre%')";
            Mysql::open();
            $result = Mysql::query($query);
            //$variableDataList = array();
            while ($row = Mysql::get_row_array($result)) {
                $variableData = new Acta();
                $variableData->setTitulo($row['titulo']);
                $variableData->setDescripcion($row['descripcion']);
                $variableData->setFecha($row['fecha']);
                $variableData->setNombre($row['nombre']);
               // array_push($variableDataList, $variableData);
            }
            Mysql::close();
            return json_encode($variableData);
            }else{
                $query = "SELECT * FROM acta WHERE fecha='$fecha'";
                //$query = "call sp_getAdctaFecha('$fecha')";
                Mysql::open();
                $result = Mysql::query($query);
               // $variableDataList = array();
                while ($row = Mysql::get_row_array($result)) {
                    $variableData = new Acta();
                    $variableData->setTitulo($row['titulo']);
                    $variableData->setDescripcion($row['descripcion']);
                    $variableData->setFecha($row['fecha']);
                    $variableData->setNombre($row['nombre']);
                    //array_push($variableDataList, $variableData);
                }
                Mysql::close();
                return json_encode($variableData);
        }
        
    }//get acta
}
