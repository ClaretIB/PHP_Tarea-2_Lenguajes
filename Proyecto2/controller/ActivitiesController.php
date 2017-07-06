<?php
include 'model/ActivitiesModel.php';

class ActivitiesController {
    private $model;
    
    function __construct() {
        $this->model= new ActivitiesModel();
    }
    
    public function invoke() {
        
        if(isset($_POST['methodNameA'])){
            switch ($_POST['methodNameA']) {
                    case "cargaCaledarioDeActividades":
                        echo $this->model->cargaCaledarioDeActividades($_POST['fechaConsulta']);
                        break;
                    case "addActivities":
                        echo $this->model->addActivities($_POST['day'], $_POST['hour'], $_POST['name'], $_POST['hourFin']);
                        break;
                    case "cargaCaledarioSalonActividades":
                        echo $this->model->cargaCaledarioSalonActividades($_POST['fechaConsulta']);
                        break;
                    case "addSalonActivities":
                        echo $this->model->addSalonActivities($_POST['day'], $_POST['hour'],
                                $_POST['namePerson'], $_POST['email'], $_POST['tarjeta'], $_POST['hourFin'],
                                $_POST['servicios'],$_POST['total'], $_POST['fact']);
                        break;
                    case "cancelarReserva":
                        echo $this->model->cancelarReserva($_POST['fecha'], $_POST['numFactura']);
                        break;
                    default:
                        include 'view/activitiesView.php';
                        break;
                }//switch
        }else{
             include 'view/activitiesView.php';
        }
        
    }//invoke
}
