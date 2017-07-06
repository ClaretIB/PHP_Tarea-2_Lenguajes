<?php
require_once 'database/Mysql.php';
include 'entity/Movimientos.php';

class CajachicaModel {
    
    function __construct() {
        
    }
    
    public function addGastos($fecha, $motivo, $monto) {
        try {
            Mysql::open();
            $query2 = "insert into gastos_ingresos(motivo, fecha, monto, tipo) values('$motivo', '$fecha', $monto, 'gasto')";
            $query = "update cajachica set monto = monto -$monto where id=1"; 
            //$query ="call addGastos('$fecha', '$motivo', $monto)";
            $result2 =Mysql::execute($query2);
            $result=Mysql::execute($query);  
            if ($result) {
                Mysql::close();
                return "Gasto rebajado de la caja chica";   
            }
            Mysql::close();
            return "No se ha podido realizar la operacion";
            
        } catch (Exception $exc) {
            return "No se ha podido realizar la operacion";
        }
    }//addgastos
    
    public function addIngresos($fecha, $motivo, $monto) {
        try {
            Mysql::open();
            $query2 ="insert into gastos_ingresos(motivo, fecha, monto, tipo) values('$motivo', '$fecha', $monto, 'ingreso')";
            $query = "update cajachica set monto = monto +$monto where id=1";
            $result2=Mysql::execute($query2);
            //$query = "call addIngresos('$fecha', '$motivo', $monto)";
            $result=Mysql::execute($query);
            
            if ($result) {
                Mysql::close();
                return "Ingreso agregado de la caja chica";   
            }
            Mysql::close();
            return "No se ha podido realizar la operacion";
            
        } catch (Exception $exc) {
            return "No se ha podido realizar la operacion";
        }
    }//addingresos
    
    public function getReporteCajaChica($mes, $year) {
        $fecha = $year."-".$mes."-";
        $query = "SELECT * FROM gastos_ingresos WHERE gastos_ingresos.fecha like '$fecha%' ";
        //$query =" call sp_getReporteCajaChica('$fecha%')";
        Mysql::open();
        $result = Mysql::query($query);
        $variableDataList = array();
        while ($row = Mysql::get_row_array($result)) {
            $variableData = new Movimientos();
            $variableData->setFecha($row['fecha']);
            $variableData->setMotivo($row['motivo']);
            $variableData->setMonto($row['monto']);
            $variableData->setTipo($row['tipo']);
            array_push($variableDataList, $variableData);
        }
        Mysql::close();
        return json_encode($variableDataList);
    }
}
