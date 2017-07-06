<?php
include 'model/CajachicaModel.php';

class cajachicaController {
    private $model;
    
    function __construct() {
        $this->model = new CajachicaModel();
    }

    public function invoke() {
        if(isset($_POST['methodNameCC'])){
            switch ($_POST['methodNameCC']) {
                    case "addIngresos":
                        echo $this->model->addIngresos($_POST['fecha'],$_POST['motivo'],$_POST['monto']);
                        break;
                    case "addGastos":
                        echo $this->model->addGastos($_POST['fecha'], $_POST['motivo'], $_POST['monto']);
                        break;
                    case "getReporteCajaChica":
                        echo $this->model->getReporteCajaChica($_POST['mes'], $_POST['year']);
                        break;
                    default:
                        include 'view/cajaChicaView.php';
                        break;
                }//switch
        }else{
             include 'view/cajaChicaView.php';
        }
    }//invoke
}
