<?php
include_once 'header.php';
?>

<section id="container-partner">
    <section id="main-partner">
        <article id="article-partner">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" id="btn_resporte_cc" href="#home">Reporte</a></li>
                <li><a data-toggle="tab" id="btn_cc_ingresos" href="#menu1">Ingresos</a></li>
                <li><a data-toggle="tab" id="btn_cc_gastos" href="#menu2">Gastos</a></li>
            </ul>
        </article>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Reporte caja chica</h3>
                <b>Ingrese el ano que desea consultar</b>
                <select name="" id="selectidanoreporte">
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                </select><br>
                <b>Ingrese el mes que desea consultar</b>
                <select id="selectidmesreporte">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select><br>
                <button class="btn btn-primary" id="btnidreporte">Consultar</button>
                <div id="container_partner_table" class="table_height">
                    <table id="reporte_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Motivo</th>
                                <th>Tipo Movimiento</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <p id="resultRegistroCajaChicaNo"></p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                    <h3>Ingresos</h3>
                    <b>Selecciona la fecha</b>
                    <input type="date" id="fechaIngreso"><br>
                    <b>Motivo</b>
                    <input type="text" id="motivoIngreso" class="form-control">
                    <b>Monto</b>
                    <input type="number" id="montoIngreso" class="form-control"><br>
                    <button class="btn btn-primary" id="btnAddIngreso">Ingresar</button>
                    <p id="resultidingresos"></p>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                    <h3>Gastos</h3>
                    <b>Selecciona la fecha</b>
                    <input type="date" id="fechaGasto"><br> 
                    <b>Motivo</b>
                    <input type="text" id="motivoGasto" class="form-control">
                    <b>Monto</b>
                    <input type="number" id="montoGasto" class="form-control"><br>
                    <button class="btn btn-primary" id="btnAddGasto">Ingresar</button>
                    <p id="resultidgastos"></p>
                </div>
            </div>
        </div>
    </section>
</section>

<?php
include_once 'footer.php';
?>
