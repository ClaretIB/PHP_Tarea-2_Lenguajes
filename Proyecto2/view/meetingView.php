<?php
include_once 'header.php';
?>

<section id="container-partner">
    <section id="main-partner">
        <article id="article-partner">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" id="btn_salon_id" href="#home">Nueva Acta</a></li>
                <li><a data-toggle="tab" id="btn_salon_otras" href="#menu1">Consultar Actas</a></li>
            </ul>
        </article>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
               

                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                        <form method="post" action="?meetings" enctype="multipart/form-data">
                            <h3>Nueva Acta</h3>
                            <p>Titulo</p><input type="text" class="form-control" id="tituloActa" name="titulo">
                            <p>Descripcion</p><textarea name="descripcion" id="descripcionActa" cols="10" rows="5" class="form-control"></textarea>
                            <p>Agregar archivo</p><input type="file" name="archivo" accept="application/msword">
                            <input type="submit" value="subir" name="subir">
                       <!-- <button class="btn btn-primary" id="addReuniones">Guardar</button>-->
                        </form>
                        <div>
                            <?php
                                if(isset($respuesta))
                                    echo $respuesta;
                            ?>
                        </div>
                    </div>
                
            </div>
            <div id="menu1" class="tab-pane fade">
             <div id="heigAcomodocel"  class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 ">
                <h3>Consultar Actas</h3>
                    <label for="">Seleccione una fecha a consultar</label><br>
                    <input type="date" id="fechaReunionConsultar" class="form-control">
                    <b>ó</b><br>
                    <label for="">Escriba el nombre del documento a consultar</label><br>
                    <input type="text" id="nombreReunionConsultar" class="form-control">
                    <br>
                    <button class="btn btn-primary" id="consultarReuniones">Buscar</button>
                    <br>
                    <div class="hide" id="divResultActasBuscar">
                        <b class>Titulo</b>
                        <p id="tituloResultDocumento"></p>
                        <b>Fecha de la reunion</b>
                        <p id="tituloResultfecha"></p>
                        <b>Descripcion</b>
                        <p id="tituloResultDescripcion"></p>
                        <b>Documento del acta</b>
                        <p id="muestraActa"></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</section>
   
   
   
<?php
include_once 'footer.php';
?>