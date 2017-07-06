<?php
include_once 'header.php';
?>

<section id="container-partner">
    <section id="main-partner">
        <article id="article-partner">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" id="partner_id_btn" href="#home">Asociados</a></li>
                <li class=""><a data-toggle="tab" id="admin_id_btn" href="#menu1">Junta Administrativa</a></li>
                <li><a data-toggle="tab" href="#menu2">+</a></li>
            </ul>
        </article>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Asamblea Asociados</h3>
                <div id="container_partner_table" class="table_height">
                    <table id="partner_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Junta Administrativa</h3>
                <div id="container_admin_table" class="table_height">
                    <table id="admin_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Direccion</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >
                    <h3>Agregar Asociado</h3>
                        <label for="rol_partner">Elija el tipo de asociado</label>
                        <select name="rol_partner" id="rol_partner" class="form-control">
                            <option value="asociado">Asamblea de asociados</option>
                            <option value="juntaDirecitiva">Junta Directiva</option>
                        </select>
                        <br>
                        <input type="number" id="id_partner" name="id_partner" placeholder="Cedula" class="form-control" required>
                        <br>
                        <input type="password" id="pass_partner" name="pass_partner" placeholder="Contrasena" class="form-control" required>
                        <br>
                        <input type="text" id="name_partner" name="name_partner" placeholder="Nombre y Apellidos" class="form-control" required>
                        <br>
                        <input type="email" id="email_partner" name="email_partner" placeholder="Correo Electronico" class="form-control" required>
                        <br>
                        <input type="text" id="address_partner" name="address_partner" placeholder="Direccion" class="form-control" required>
                        <br>
                        <input type="button" class="btn btn-primary" id="add_partner" value="Agregar">
                </div>
                <div  class="info_result col-xs-12 col-sm-6 col-md-4 col-lg-4 col-lg-offset-1 hide" id="info_result_id">
                    <p id="add_partner_result"></p>
                </div>
            </div>
        </div>
    </section>
</section>

<!--************************************************ MODALES*******************************************-->
<div class="modal fade" id="modalPartnerUpdate" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="btn_partner_update_close">&times;</button>
                        <h4 class="modal-title">Actualizar</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="">
                            <p id="partner_name_update"></p>
                            <b>Email</b><input type="email" placeholder="Email" class="form-control" id="partner_email_update" >
                            <b>Direccion</b><input type="text" placeholder="Direccion" class="form-control" id="partner_address_update" >
                            <b>Contrasena</b><input type="password" placeholder="Nueva Contrasena" class="form-control" id="partner_password_update" >
                            <button class="btn btn-primary" id="btn_partner_update">Actualizar</button>
                            <p id="result_partner_update"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_partner_update_close2">Close</button>
                    </div>
                </div>

            </div>
        </div>
<!--************************Junta directiva modal*************************-->  
<div class="modal fade" id="modalPartnerDirectUpdate" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="btn_partnerD_update_close">&times;</button>
                        <h4 class="modal-title">Actualizar</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="">
                        <p id="partner_nameD_update"></p>
                            <div class="checkbox">
                            <b>Estado</b>
                            <label><input type="checkbox" value="" id="partnerD_state_update"></label>
                            </div>
                            <b>Email</b><input type="email" placeholder="Email" class="form-control" id="partnerD_email_update" >
                            <b>Diireccion</b><input type="text" placeholder="Direccion" class="form-control" id="partnerD_address_update" >
                            <b>Contrasena</b><input type="password" placeholder="Nueva Contrasena" class="form-control" id="partnerD_password_update" >
                            <button class="btn btn-primary" id="btn_partnerD_update">Actualizar</button>
                            <p id="result_partnerD_update"></p> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_partnerD_update_close2">Close</button>
                    </div>
                </div>

            </div>
        </div>      

<?php
include_once 'footer.php';
?>