<!DOCTYPE html>
<html lang="en">
    <head>
        <title>S.G.A.I</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="view/css/style.css"/>
    </head>

    <body>
        <!--************************************************** HEAER ***************************************************-->
        <header>
            <nav class="navbar navbar-inverse" id="navNormal">
                <div class="container-fluid">
                    <!-- <div class="navbar-header">
                         <a class="navbar-brand" href="#">S.G.A.I</a>
                     </div>-->
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Inicio</a></li><!--class="active"-->
                        <li class=""><a id="btn_asociados" href="?partner">Asociados</a></li>
                        <li><a id="btn_actividades" href="?activities">Actividades</a></li>
                        <li class=""><a id="btn_reuniones" href="?meetings">Reuniones</a></li>
                        <li class=""><a id="btn_cajaChicaa" href="?cajachica">Caja Chica</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-placement="bottom" data-toggle="modal" data-target="#modalLogin" href="#" id="login"><span class="glyphicon glyphicon-user" ></span>Iniciar Sesion</a></li>
                        <li><a href="#" id="salirLogin"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
                    </ul>
                </div>
            </nav>
            <!--****segundo header****-->
            <nav class="hide" id="navMovile">
                <ul id="ulsegundomenu">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" id="menumovil"><img src="view/img/menu.png" alt=""><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php">Inicio</a></li>
                                <li class=""><a id="btn_asociados" href="?partner">Asociados</a></li>
                                <li><a id="btn_actividades" href="?activities">Actividades</a></li>
                                <li class=""><a id="btn_reuniones" href="?meetings">Reuniones</a></li>
                                <li class=""><a id="btn_cajaChicaa" href="?cajachica">Caja Chica</a></li>
                            </ul>
                        </li>
                        <li class="rigthli"><a data-placement="bottom" data-toggle="modal" data-target="#modalLogin" href="#" id="login"><span class="glyphicon glyphicon-user" ></span></a></li>
                        <li class="rigthli"><a href="#" id="salirLogin"><span class="glyphicon glyphicon-log-in"></span></a></li>
                </ul>
            </nav>
        </header>

        <!--************** LOGIN ******************-->
      
        <div class="modal fade" id="modalLogin" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="closeLogin">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="">
                                <input type="number" placeholder="Usuario" class="form-control" maxlength="10" id="username" required>
                                <input type="password" placeholder="Contrasena" class="form-control" id="userpass" required>
                                <button class="btn btn-primary" id="btn_login">Ingresar»</button>                           
                                <p id="result_login"></p> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="closeLogin2">Close</button>
                    </div>
                </div>

            </div>
        </div>
