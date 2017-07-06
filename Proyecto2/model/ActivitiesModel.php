<?php
require_once 'database/Mysql.php';
include 'entity/Activity.php';
include 'entity/Reserva.php';

class ActivitiesModel {
    
    function __construct() {
        
    }
    
    public function cargaCaledarioDeActividades($fechaConsulta) {
        $query = "SELECT * FROM activities WHERE date='$fechaConsulta'";
        //$query = "call sp_cargaCaledarioDeActividades('$fechaConsulta')";
        Mysql::open();
        $result = Mysql::query($query);
        $variableDataList = array();
        while ($row = Mysql::get_row_array($result)) {
            $variableData = new Activity();
            $variableData->setName($row['nameActivity']);
            $variableData->setHour($row['hour']);
            $variableData->setDate($row['date']);
            array_push($variableDataList, $variableData);
        }
        Mysql::close();
        return json_encode($variableDataList);
    }//cargaCalendarioDeActividades
    
    public function addActivities($day, $hour, $name, $hourFin) {
        try{
        $inicio = (int)$hour;
        $fin = (int)$hourFin;
        for($i=$inicio; $i<= $fin; $i++){
            Mysql::open();
            $query = "insert into activities (date, hour, nameActivity) values('$day', '$i', '$name')";
            //$query = "call sp_addActivities('$day', '$i', '$name')";
            Mysql::execute($query);
            Mysql::close();
        }
            
            return "Actividad agregada con exito";
        } catch (Exception $exc) {
            return "Problemas con el sistema, la actividad no se pudo agregar";
        }
    }//addActivities
    
    public function cargaCaledarioSalonActividades($fechaConsulta) {
        $query = "SELECT * FROM activitiessalon WHERE fecha='$fechaConsulta'";
        //$query = "call sp_cargaCaledarioSalonActividades('$fechaConsulta')";
        Mysql::open();
        $result = Mysql::query($query);
        $variableDataList = array();
        while ($row = Mysql::get_row_array($result)) {
            $variableData = new Reserva();
            $variableData->setNombrePersona($row['nombre_persona']);
            $variableData->setEmail($row['email']);
            $variableData->setTarjeta($row['numerotarjeta']);
            $variableData->setFecha($row['fecha']);
            $variableData->setHora($row['hora']);
            $variableData->setTotal($row['total']);
            array_push($variableDataList, $variableData);   
        }
        Mysql::close();
        return json_encode($variableDataList);
    }//cargaCaledarioSalonActividades
    
    function addSalonActivities($day, $hour, $namePerson, $email, $tarjeta, $hourFin, $servicios, $total, $fact) {
        try{
        $inicio = (int)$hour;
        $fin = (int)$hourFin;
        $motivo = "Alquiler del salon a: ".$namePerson;
        for($i=$inicio; $i<= $fin; $i++){
            Mysql::open();
            $query = "insert into activitiessalon (nombre_persona, email, numerotarjeta, fecha, hora, total, numero_factura) values('$namePerson', '$email', '$tarjeta', '$day', '$i', $total, '$fact')";
           // $query ="call sp_addSalonActivities('$namePerson', '$email', '$tarjeta', '$day', '$i', $total, '$fact')";
            Mysql::execute($query);
            Mysql::close();
        }
         Mysql::open();
            $query2 ="insert into gastos_ingresos(motivo, fecha, monto, tipo) values('$motivo', '$day', $total, 'ingreso')";
            $query3 = "update cajachica set monto = monto +$total where id=1";
            Mysql::execute($query2);
            //$query3 = "call sp_addSalonActivities_caja('$motivo', '$day', $total)";
            Mysql::execute($query3);
            Mysql::close();
        $asunto    = 'Factura de reserva del salon';
        $cabeceras = 'From: klarethi@gmail.com' . "\r\n" .
                     'Reply-To: klarethi@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

        if(mail($email, $asunto, $servicios, $cabeceras)) {
             return $servicios."";
        } else {
            return "La reservacion no se pudo realizar";
        }
            
        } catch (Exception $exc) {
            return "Problemas con el sistema, la reservacion no se pudo agregar";
        }
    }//addActividadesSalon
    
    public function cancelarReserva($fecha, $numFactura) {
       $query = "DELETE FROM activitiessalon WHERE fecha ='$fecha' and numero_factura='$numFactura'";
        $query = "SELECT numero_factura, email FROM activitiessalon WHERE fecha='$fecha'";
       // $query = "call sp_cancelarReserva('$fecha')";
        Mysql::open();
        $result = Mysql::query($query);
        
        while ($row = Mysql::get_row_array($result)) {
            $conta= 0;
            if($row['numero_factura'] == $numFactura){
                if($conta ==0){
                   $email = $row['email'];
                   $conta =1;
                   return $this->borrarReserva($fecha, $numFactura, $email);  
                }                 
            }  
        }
        return "Reservacion NO exitosa, revise los datos.";
        Mysql::close();
        return json_encode($variableDataList);
    }//cancelarReserva
    
    private function borrarReserva($fecha, $numFactura, $email) {
        try{
            Mysql::open();
            $query = "DELETE FROM activitiessalon WHERE fecha ='$fecha' and numero_factura='$numFactura'";
           // $query = "call sp_borrarReserva('$fecha', '$numFactura')";
            Mysql::execute($query);
            Mysql::close();
            
            $asunto    = 'Factura de reserva del salon';
            $cabeceras = 'From: klarethi@gmail.com' . "\r\n" .
                     'Reply-To: klarethi@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

            if(mail($email, $asunto, 'Cancelacion de la factura# '.$numFactura.' realizada con exito. \n Recuerde que el 20% rebajado de su tarjeta no se devolvera.', $cabeceras)) {
                 return "Reservacion cancelada con exito";
            } else {
                return "La cancelacionno se pudo realizar";
            }
        } catch (Exception $exc) {
            return "Problemas con el sistema, la  cancelacion no se pudo agregar";
        }
    }
}
