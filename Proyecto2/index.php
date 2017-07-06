<?php

        if (isset($_GET['activities'])) {
        include_once 'controller/ActivitiesController.php';
        $activitiesController = new ActivitiesController();
        $activitiesController->invoke();
    }else if(isset($_GET['meetings'])){
        include_once 'controller/MeetingsController.php';
        $meetingController = new MeetingsController();
        $meetingController->invoke();
    
    } else if(isset($_POST['methodNameR'])){
        include_once 'controller/MeetingsController.php';
        $meetingController = new MeetingsController();
        $meetingController->invoke();
    }else if(isset($_POST['methodNameA'])){
        include_once 'controller/ActivitiesController.php';
        $activitiesController = new ActivitiesController();
        $activitiesController->invoke();
    }else if(isset($_GET['cajachica'])){
        include_once 'controller/cajachicaController.php';
        $cajachController = new cajachicaController();
        $cajachController->invoke();
    }else if(isset($_POST['methodNameCC'])){
        include_once 'controller/cajachicaController.php';
        $cajachController = new cajachicaController();
        $cajachController->invoke();
    }else {
        include_once 'controller/PartnerController.php';
        $partnerController = new PartnerController();
        $partnerController->invoke();
    }
    
?>

    