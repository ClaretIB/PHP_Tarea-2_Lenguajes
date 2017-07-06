<?php


require_once 'database/Mysql.php';
include 'entity/Partner.php';

class PartnerModel {

    function __construct() {
        
    }

    public function addPartner($id, $password, $rol, $fullname, $email, $address) {
        try {
            $state;
            if ($rol == "juntaDirecitiva") {
                $state = 1;
            } else {
                $state = 2;
            }
            $password_salt = password_hash($password, PASSWORD_DEFAULT);
            Mysql::open();
            //$query = "call sp_add_users($id,'$password_salt','$rol',$state,'$fullname','$email','$address')";
            $query = "insert into users(identification, password, rol, state, fullname, email, address) values($id,'$password_salt','$rol',$state,'$fullname','$email','$address')";
            $result=Mysql::execute($query);
            
            if ($result) {
                Mysql::close();
                return 1;   
            }
            Mysql::close();
            return 0;
            
        } catch (Exception $exc) {
            return 0;
        }
    }//addPartner

    public function checkUser($id, $password) {
        if(!is_numeric($id)){
            return 0;
        }else{
        //$query = "call sp_checkUser($id)";
            $query= "select identification, password, rol, state from users where identification= $id";
        Mysql::open();
        $result = Mysql::query($query);
        $datos = "";
        while ($row = Mysql::get_row_array($result)) {
            if (password_verify($password, $row['password'])) {
                if($row['state']=="0"){
                    $datos = "visitante";
                    return 0;
                }else{
                $datos = $row['rol'];
                return $datos;
                }
            }
        }
        Mysql::close();
        if ($datos == "") {
            return 0;
        }
        }
    }//checkUser
    
    public function getAllPartnerAdmin() {
        $query = "SELECT * FROM users WHERE rol='juntaDirecitiva'";
        //$query ="call sp_getAllPartnerAdmin()";
        Mysql::open();
        $result = Mysql::query($query);
        $variableDataList = array();
        while ($row = Mysql::get_row_array($result)) {
            $variableData = new Partner();
            $variableData->setIdentification($row['identification']);
            $variableData->setFullname($row['fullname']);
            $variableData->setEmail($row['email']);
            $variableData->setAddress($row['address']);
            $variableData->setState($row['state']);
            array_push($variableDataList, $variableData);
        }
        Mysql::close();
        return json_encode($variableDataList);
    }//getAllPartnerAdmin
    
    public function getAllPartner() {
        $query = "SELECT * FROM users WHERE rol='asociado'";
        //$query = "call sp_getAllPartner()";
        Mysql::open();
        $result = Mysql::query($query);
        $variableDataList = array();
        while ($row = Mysql::get_row_array($result)) {
            $variableData = new Partner();
            $variableData->setIdentification($row['identification']);
            $variableData->setFullname($row['fullname']);
            $variableData->setEmail($row['email']);
            $variableData->setAddress($row['address']);
            array_push($variableDataList, $variableData);
        }
        Mysql::close();
        return json_encode($variableDataList);
    }//getAllPartner
    
    function updatePartner($id, $password, $address, $email) {
        try {
            if ($password == "") {
                Mysql::open();
                $query = "update users set email='$email', address='$address' where identification=$id";
               // $query = "call sp_updatePartner('$email', '$address', $id)";
                $result=Mysql::execute($query);
                Mysql::close();
                return "Asociado actualizado con exito";         
            } 
            $password_salt = password_hash($password, PASSWORD_DEFAULT);
            Mysql::open();
            $query = "update users set email='$email', address='$address', password='$password_salt' where identification=$id";
           // $query = "call sp_sp_updatePartnerPass($id, '$password_salt', '$address', '$email')";
            $result=Mysql::execute($query);
            if ($result) {
                Mysql::close();
                return "Asociado actualizado con exito";   
            }
            Mysql::close();
            return "Hubo problemas actualizando el asociado";
            
        } catch (Exception $exc) {
            return "Hubo problemas con los datos ao la base de datos esta caida";
        }
    }//updatePartner
    
    function updatePartnerDirectorate($id,$password,$address,$email,$state) {
        if ($password == "") {
                Mysql::open();
                $query = "update users set email='$email', address='$address', state=$state where identification=$id";
                //$query =  "call sp_updatePartnerDirectorate($id,'$address','$email',$state)";
                $result=Mysql::execute($query);
                Mysql::close();
                return "Asociado actualizado con exito";         
            } else{
                $password_salt = password_hash($password, PASSWORD_DEFAULT);
                Mysql::open();
                $query = "update users set email='$email', address='$address', password='$password_salt', state=$state where identification=$id";
                //$query = "call sp_updatePartnerDirectoratePass($id,'$password_salt','$address','$email',$state)";
                $result=Mysql::execute($query);
                if ($result) {
                    Mysql::close();
                    return "Asociado actualizado con exito";   
                }
                Mysql::close();
                return "Hubo problemas actualizando el asociado";
            }
    }//updatePartnerDirectorate
    
    public function cerrarSesion() {
    }
}

?>