<?php
include_once 'header.php';
?>


<section id="container-partner">
    <section id="main-partner">
        <article id="article-partner">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" id="btn_salon_id" href="#home">Salon</a></li>
                <li class=""><a data-toggle="tab" id="btn_salon_otras" href="#menu1">Otras</a></li>
            </ul>
        </article>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Calendario Actividades Salon</h3>
                <label for="">Seleccione una fecha a consultar<input type="date" id="fechaSalonConsultar"></label>
                <button class="btn btn-primary" id="consultarASalon">Consultar</button>
                <div id="container_partner_table" class="table_height">
                    <table id="salon_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hora</th>
                                <th>Reservado por</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Clendario de Actividades</h3>
                <label for="">Seleccione una fecha a consultar<input type="date" id="fechaActividadConsultar"></label>
                <button class="btn btn-primary" id="consultarAActividad">Consultar</button>
                <div id="container_admin_table" class="table_height">
                    <table id="otras_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hora</th>
                                <th>Actividad(es)</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>

<!--**************************************MODALES**************************************************-->
<div class="modal fade" id="modalAddSalon" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="btn_salon_add_close">&times;</button>
                <h4 class="modal-title">Reserva del salon</h4>
            </div>
            <div class="modal-body ">
                <div id="contentReservSalon">
                    <b>Dia:</b>
                    <p id="actividadSalon_dayandhour2_add"></p>
                    <b>Hora Inicio:</b>
                    <p id="actividadSalon_dayandhour_add"></p>
                    <b>Seleccione la hora fin de la actividad c/u 5000</b>
                    <select name="" id="cargarHoraFinActividadesSalon"></select><br>
                    <b>Nombre Reservante</b><input type="text" placeholder="Nombre" class="form-control" id="salon_nombrePersona" >
                    <b>Email</b><input type="email" placeholder="Email" class="form-control" id="salon_email" >
                    <b>Numero de trajeta</b><input type="text" placeholder="Numero de tarjeta" class="form-control" id="tarjetaSalon">

                    <h4 class="titleColor">Servicios de salon</h4>
                    <b>Si desea mesas seleccione la cantidad c/u 1000</b>
                    <input type="number" id="id_cantidad_mesas" min="0" max="50" value="0" class=".solo-numero"><br>
                    <b>Si desea sillas seleccione la cantida c/u 100</b>
                    <input type="number" id="id_cantidad_sillas" min="0" max="500" value="0" class=".solo-numero">
                   
                    <h5 class="titleColor">Servivio de Cocina</h5>
                        <b>Merienda(Reposteria y cafe) c/u 2000</b>
                        <p>Seleccione la cantdad de meriendas por personas(sillas)</p>
                        <select name="" id="cantidadMerienda">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select><br>
                        <b>Plato Fuerte (Desayuno, Almuerzo, Cena) c/u 3000</b>
                        <p>La escogencia del plato lo hace cada persona segun el menu y la franja horaria que este.</p>
                        <p>Seleccione la cantdad de platos fuertes por personas(sillas)</p>
                        <select name="" id="cantidadPlatosFuerte">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    
                    <p>Mateleria (se cobra por la cantidad de mesas) c/u 2000</p>
                    <div class="checkbox">
                        <label><input type="checkbox" value="manteleria"  id="chechboxManteleria">Manteleria</label>
                    </div>
                    <button class="btn btn-primary" id="btn_salon_precio">Calcular precio</button><br>
                    <b id="resultado_precio"></b>
                    <p>Le recordamos que una vez reservado se hara un rebajo del 20% del coste como garantia de la reserva</p>

                    <button class="btn btn-primary" id="btn_salon_add">Reservar</button>
                    <p id="result_salon_add"></p>
                </div>
                <div class="hide" id="cancelaciondereserva">
                    <h3>Cancelacion de reserva</h3>
                    <b>Ingrese el numero de factura cancelar la reservacion</b><br>
                    <input type="text" id="numeroFacturaConsulta"><br>
                    <button class="btn btn-primary" id="btn_cancelar_salon">Cancelar</button>
                    <b id="resultcancelacionid"></b>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_salon_add_close2">Close</button>
            </div>
        </div>

    </div>
</div>

<!--*************MODAL ACTIVIDADES************-->
<div class="modal fade" id="modalAddActividades" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="btn_actividades_add_close">&times;</button>
                <h4 class="modal-title">Agregar actividades</h4>
            </div>
            <div class="modal-body ">
                <div class="">
                    <b>Dia:</b>
                    <p id="actividad_dayandhour2_add"></p>
                    <b>Nombre Actividad</b><input type="text" placeholder="Ej:concierto" class="form-control" id="actividad_nombre_agregar" > 
                    <b>Hora Inicio:</b>
                    <p id="actividad_dayandhour_add"></p>
                    <b>Hora Fin:</b>
                    <select name="" id="cargarHoraFinActividades"></select>                         
                    <button class="btn btn-primary" id="btn_actividad_add">Agregar</button>
                    <p id="result_actividad_add"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_actividades_add_close2">Close</button>
            </div>
        </div>

    </div>
</div>

<?php
include_once 'footer.php';
?>
