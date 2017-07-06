<?php

include 'model/PartnerModel.php';

class PartnerController {
    private $model;
    
    function __construct() {
        $this->model = new PartnerModel();
    }
    
    public function invoke() {
        if (isset($_GET['partner'])) { 
                include 'view/partnerView.php';
        }
        else if(isset($_POST['methodName'])){
            switch ($_POST['methodName']) {
                    case "addPartner":
                        echo $this->model->addPartner(
                            $_POST['id'],$_POST['password'], $_POST['rol'],
                            $_POST['fullname'],$_POST['email'],$_POST['address']);
                        break;
                    case "checkUser":
                        echo $this->model->checkUser($_POST['username'],$_POST['passworduser']);
                        break;
                    case "getAllPartnerAdmin":
                        echo $this->model->getAllPartnerAdmin();
                        break;
                    case "getAllPartner":
                        echo $this->model->getAllPartner();
                        break;
                    case "updatePartner":
                        echo $this->model->updatePartner($_POST['id'],$_POST['password'],$_POST['address'],$_POST['email']);
                        break;
                    case "updatePartnerDirectorate":
                        echo $this->model->updatePartnerDirectorate($_POST['id'],$_POST['password'],
                                $_POST['address'],$_POST['email'],$_POST['state']);
                        break;
                    case "cerrarSesion":
                        echo $this->model->cerrarSesion();
                        break;
                    default:
                        include 'view/partnerView.php';
                        break;
                }//switch
        }
        else{
            if(isset($_GET['add'])){
                //$reultInsert = $this->model->addPartner($_POST['searchType'], $_POST['productId']);
            }
            include 'view/home.php';
        }
        
    }//invoke
}
 ?>