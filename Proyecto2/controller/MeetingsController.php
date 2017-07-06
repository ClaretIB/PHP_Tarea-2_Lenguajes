<?php

include 'model/MeetingsModel.php';

class MeetingsController {

    private $model;

    function __construct() {
        $this->model = new MeetingsModel();
    }

    public function invoke() {
        if (isset($_POST['methodNameR'])) {
            switch ($_POST['methodNameR']) {
                case "getActa":
                    echo $this->model->getActa($_POST['fecha'], $_POST['nombre']);
                    break;
                default:
                    include 'view/activitiesView.php';
                    break;
            }//switch
        }else if(isset($_POST['subir'])) {
            $nombre = $_FILES['archivo']['name'];
            $tipo = $_FILES['archivo']['type'];
            $tamanio = $_FILES['archivo']['size'];
            $ruta = $_FILES['archivo']['tmp_name'];
            $destino = "view/docs/" . $nombre;
            if ($nombre != "") {
                if (copy($ruta, $destino)) {
                    $titulo = $_POST['titulo'];
                    $descri = $_POST['descripcion'];
                    $this->model->addMeeting($titulo, $descri, $nombre);
                    include 'view/meetingView.php';
                }
                include 'view/meetingView.php';
            }
            include 'view/meetingView.php';
        } else {
            include 'view/meetingView.php';
        }
    }

//invoke
}

