$( document ).ready(function() {
   // localStorage.setItem("loguinRol", "visitante");

    $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          })
});

function validaCorreos(correo){
     var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (regex.test(correo.trim())) {
        return true;
       // alert("correo bien");
    } else {
        return false;
       //  alert("correo mal");
    }
}

/*-----------------------------------------------------------------------------------------------------
---------------------------Manejo de roles------------------------------------------------------------*/
function manejoRoles(){
var ff =localStorage.getItem("loguinRol");
    /*valida si el localstorage no existe*/
    if (localStorage.getItem("loguinRol")!=null) {
        //alert(ff);
        var fff= "asociado";
        // alert(ff.length);
        if(ff.length == "15"){
            //alert("entre secre");
            $("#btn_asociadosCont").removeClass('hide');
            $("#btn_reuniones").removeClass('hide');
            $("#btn_cajaChicaa").removeClass('hide');
            $("#partner_id_btn").removeClass('hide');
            $("#admin_id_btn").removeClass('hide');
            $("#btn_salon_otras").removeClass('hide');
            $("#login").addClass('hide');
             $("#btn_cc_ingresos").removeClass('hide');
             $("#btn_cc_gastos").removeClass('hide');
        }else if(ff.length== "20" || ff.length =="13"){
          //  alert("entre aso");
            $("#btn_asociadosCont").addClass('hide');
            $("#btn_cajaChicaa").removeClass('hide');
            $("#btn_reuniones").addClass('hide');
            $("#partner_id_btn").removeClass('hide');
            $("#admin_id_btn").addClass('hide');
             $("#btn_salon_otras").addClass('hide');
             $("#login").addClass('hide');
             $("#btn_cc_ingresos").addClass('hide');
             $("#btn_cc_gastos").addClass('hide');
        }else{
          //  alert("entre visi");
            $("#btn_asociadosCont").addClass('hide');
            $("#btn_reuniones").addClass('hide');
            $("#btn_cajaChicaa").addClass('hide');
            $("#partner_id_btn").addClass('hide');
            $("#admin_id_btn").addClass('hide');
            $("#btn_salon_otras").addClass('hide');
            $("#login").removeClass('hide');
            $("#btn_cc_ingresos").addClass('hide');
            $("#btn_cc_gastos").addClass('hide');
           
        }
    }else{
        localStorage.setItem("loguinRol", "visitante");
    }




   /* var ff =localStorage.getItem("loguinRol");
    var fff= "asociado";
   // alert(ff.length);
    if(ff.length == "15"){
       // alert("entre secre");
        $("#btn_asociados").removeClass('hide');
        $("#btn_reuniones").removeClass('hide');
        $("#btn_cajaChicaa").removeClass('hide');
        $("#partner_id_btn").removeClass('hide');
        $("#admin_id_btn").removeClass('hide');
        $("#btn_salon_otras").removeClass('hide');
        $("#login").addClass('hide');
         $("#btn_cc_ingresos").removeClass('hide');
         $("#btn_cc_gastos").removeClass('hide');
    }else if(ff.length== "20" || ff.length =="13"){
      //  alert("entre aso");
        $("#btn_asociados").addClass('hide');
        $("#btn_cajaChicaa").removeClass('hide');
        $("#btn_reuniones").addClass('hide');
        $("#partner_id_btn").removeClass('hide');
        $("#admin_id_btn").addClass('hide');
         $("#btn_salon_otras").addClass('hide');
         $("#login").addClass('hide');
         $("#btn_cc_ingresos").addClass('hide');
         $("#btn_cc_gastos").addClass('hide');
    }else{
      //  alert("entre visi");
        $("#btn_asociados").addClass('hide');
        $("#btn_reuniones").addClass('hide');
        $("#btn_cajaChicaa").addClass('hide');
        $("#partner_id_btn").addClass('hide');
        $("#admin_id_btn").addClass('hide');
        $("#btn_salon_otras").addClass('hide');
        $("#login").removeClass('hide');
        $("#btn_cc_ingresos").addClass('hide');
         $("#btn_cc_gastos").addClass('hide');
       
    }*/
}
manejoRoles();
/**************************************** add partners ***************************************************/
/*Se decidio hacerlo por post para comodidad del usuario, si hay algun problema que 
 no se borre todos los datos que ingreso y asi poder verificar que hizo mal*/
$("#add_partner").click(function () {

    if($("#id_partner").val()=="" ||  $("#pass_partner").val()=="" || $("#name_partner").val()=="" || $("#email_partner").val()=="" || $("#address_partner").val()==""){
         $("#info_result_id").removeClass("hide");
         $("#add_partner_result").html("Todos lo campos son requeridos o el numero de cedula no es un numero");
    }else{
        if(validaCorreos($("#email_partner").val())==false){ 
            $("#info_result_id").removeClass("hide");
         $("#add_partner_result").html("El email no tiene el formato adecuado");
        }else{
             $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    methodName: "addPartner",
                    id: $("#id_partner").val(),
                    password: $("#pass_partner").val(),
                    rol: $("#rol_partner").val(),
                    fullname: $("#name_partner").val(),
                    email: $("#email_partner").val(),
                    address: $("#address_partner").val()
                },
                success: function (data) {
                    $("#info_result_id").removeClass("hide");
                    if (data == 1) {
                        $("#add_partner_result").html("Asciado " + $("#name_partner").val() + " insertado con exito!");
                        $("#id_partner").val("");
                        $("#pass_partner").val("");
                        $("#name_partner").val("");
                        $("#email_partner").val("");
                        $("#address_partner").val("");
                    } else {
                        $("#add_partner_result").html("Hubo problemas al insertar el asociado, verfique la informacion");
                    }
                },
                error: function (data) {
                    console.log("error");

                }
            });
        }
   
}
});

/******************************************* verificar login *****************************************/
$("#btn_login").click(function () {
    $.ajax({
        url: "index.php",
        type: "POST",
        data: {
            methodName: "checkUser",
            username: $("#username").val(),
            passworduser: $("#userpass").val()
        },
        success: function (data) {
            $("#result_login").html(data);
            if (data != 0) {
                 $("#result_login").html("Bienvenido al sistema "+$("#username").val());
                $("#userpass").val("");
                $("#username").val("");
                localStorage.setItem("loguinRol", data);
                $("#login").addClass('hide');
                manejoRoles();

            } else {
                  $("#result_login").html("Usuario o contrasena incorecto, verfique la informacion");
                  $("#userpass").val("");
            }
        },
        error: function (data) {
            console.log("error");

        }
    });
});
$("#closeLogin").click(function(){
     $("#userpass").val("");
     $("#username").val("");
     $("#result_login").html("");
});
$("#closeLogin2").click(function(){
     $("#userpass").val("");
     $("#username").val("");
     $("#result_login").html("");    
});
/*------------cerrar sesion--------------*/
$("#salirLogin").click(function(){
    localStorage.setItem("loguinRol", "visitante");
    $("#login").removeClass('hide');
    manejoRoles();
    
   $.ajax({
        type: "POST",
        url: "index.php",
        data: {
            methodName: "cerrarSesion",
        },
        success: function (data) {
              
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
  document.location.href="index.php";
});

/************************************* CARGAR TABLAS  Y CARGAR MODALES DEACTUALIZAR ********************************/
/*---junta directiva---*/
function myFunction1(t){
    var contador=0;
    $('#admin_table tr').each(function () {
        if(contador == t.rowIndex){
            var id = $(this).find("td").eq(0).html();
            var nombre = $(this).find("td").eq(1).html();
            var email = $(this).find("td").eq(2).html();
            var direccion = $(this).find("td").eq(3).html();
            var estado = $(this).find("td").eq(4).html();
            localStorage.setItem("idjunta", id);
            localStorage.setItem("idjuntaEstado", estado);
            if(estado=="Activo"){
                $("#partnerD_state_update").attr("checked", true);
            }else{
                $("#partnerD_state_update").attr("checked", false);
            }
           // alert(id);
            $("#partner_nameD_update").html("Editando a "+nombre);
            $("#partnerD_email_update").html(email);
            $("#partnerD_email_update").val(email);
            $("#partnerD_address_update").html(direccion);
            $("#partnerD_address_update").val(direccion);
            contador++;
        }else{
            contador++;
        }      
    });
}
function cargaPartnerTableAdmin(){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "index.php",
        data: {
            methodName: "getAllPartnerAdmin",
        },
        success: function (data) {
             $("#admin_table tbody tr").remove();
            data.forEach(function (item) {
                var estado="";
                if(item.state==1){
                    estado="Activo";      
                }else{
                    estado="Desactivo";
                }
            
                var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalPartnerDirectUpdate' onclick='myFunction1(this)' ><td>" +
                item.identification + "</td><td>" +
                item.fullname + "</td><td>" +
                item.email + "</td><td>" +
                item.address+ "</td><td>" +
                estado + "</td></tr>"
     
                $("#admin_table").append(nuevafila);
                
            });
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
}
$('#admin_id_btn').click(function () {
    cargaPartnerTableAdmin();
    $("#info_result_id").addClass("hide");
});
$("#menumovil").click(function(){
    $("#info_result_id").addClass("hide");
});
/*------------ asociados----------------*/
function myFunction2(t){
    var contador=0;
    $('#partner_table tr').each(function () {
        if(contador == t.rowIndex){
            var id = $(this).find("td").eq(0).html();
            var nombre = $(this).find("td").eq(1).html();
            var email = $(this).find("td").eq(2).html();
            var direccion = $(this).find("td").eq(3).html();
            localStorage.setItem("idaociado", id);
            $("#partner_name_update").html("Editando a "+nombre);
            $("#partner_email_update").html(email);
            $("#partner_email_update").val(email);
            $("#partner_address_update").html(direccion);
            $("#partner_address_update").val(direccion);
            contador++;
        }else{
            contador++;
        }      
    });
}

function cargaPartnerTable(){
     $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "index.php",
        data: {
            methodName: "getAllPartner",
        },
        success: function (data) {
            $("#partner_table tbody tr").remove();
            data.forEach(function (item) {
               
                var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalPartnerUpdate' onclick='myFunction2(this)' ><td>" +
                item.identification + "</td><td>" +
                item.fullname + "</td><td>" +
                item.email + "</td><td>" +
                item.address + "</td></tr>" 
     
                $("#partner_table").append(nuevafila);
                
            });
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });

}
    cargaPartnerTable();
$('#partner_id_btn').click(function () {
    cargaPartnerTable();
    $("#info_result_id").addClass("hide");
   });

$('#partner_table tr').click(function () {
  //  alert("si");
   });

  /****************************************** actualizar partners  modal ********************************************/  
    $('#btn_partner_update').click(function () {
        if(validaCorreos($("#partner_email_update").val())==false){
           $("#result_partner_update").html("El email no tiene el formato adecuado"); 
        }else{
            $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                methodName: "updatePartner",
                id: localStorage.getItem("idaociado"),
                password: $("#partner_password_update").val(),
                address: $("#partner_address_update").val(),
                email: $("#partner_email_update").val()
            },
            success: function (data) {
                $("#result_partner_update").html(data);
                cargaPartnerTable();
            },
            error: function (data) {
                console.log("error");

            }
        });
        }  
   });  
$("#btn_partner_update_close").click(function(){
        $("#partner_password_update").val("");
         $("#partner_password_update").html("");
        $("#result_partner_update").html("");
        $("#result_partner_update").val("");
   });
   $("#btn_partner_update_close2").click(function(){
        $("#partner_password_update").val("");
        $("#result_partner_update").html("");
        $("#partner_password_update").html("");
        $("#result_partner_update").val("");
   });
   /*---------- junta directiva-----------*/
   $('#btn_partnerD_update').click(function () {
    
        var estado;
        if($('#partnerD_state_update').prop('checked')){
            estado = 1;
        }else{
            estado = 0;
        }
        if(validaCorreos($("#partnerD_email_update").val())==false){
            $("#result_partnerD_update").html("El email no tiene el formato adecuado");
        }else{
            $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    methodName: "updatePartnerDirectorate",
                    id: localStorage.getItem("idjunta"),
                    state: estado,
                    password: $("#partnerD_password_update").val(),
                    address: $("#partnerD_address_update").val(),
                    email: $("#partnerD_email_update").val()
                },
                success: function (data) {
                    $("#result_partnerD_update").html(data);
                    cargaPartnerTableAdmin();
                },
                error: function (data) {
                    console.log("error");

                }
            });
        }
   });     
   $("#btn_partnerD_update_close").click(function(){
        $("#partnerD_password_update").val("");
        $("#result_partnerD_update").html("");
        $("#partnerD_password_update").html("");
        $("#result_partnerD_update").val("");
   });
   $("#btn_partnerD_update_close2").click(function(){
        $("#partnerD_password_update").val("");
        $("#result_partnerD_update").html("");
        $("#partnerD_password_update").html("");
        $("#result_partnerD_update").val("");
   });
/*-------------------------------------------------ACTAS-------------------------------------------------
--------------------------------------------------------------------------------------------------------*/

function getActualDate(){
    var hoy = new Date();
    var dd = hoy.getDate();
    dd= dd+"";
    if(dd.length ==1){
        dd="0"+dd;
    }
    var mm = hoy.getMonth()+1; //hoy es 0!
    mm= mm+"";
    if(mm.length ==1){
        mm="0"+mm;
    }
    var yyyy = hoy.getFullYear();

    var fecha = yyyy+"-"+mm+"-"+dd;
  //  alert(fecha);
    return fecha;
}

$("#consultarReuniones").click(function(){

    $.ajax({
                url: "index.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    methodNameR: "getActa",
                    fecha: $("#fechaReunionConsultar").val(),
                    nombre: $("#nombreReunionConsultar").val()
                },
                success: function (data) {
                   // alert(data);
                    if(data == "" || data=="{}" ||data=="[]" || data == "{[]}"){
                        alert("No se ha encontrado ninguna acta con ese nombre");
                    }else{
                    $("#divResultActasBuscar").removeClass('hide');
                  //  alert(data);
                     $("#muestraActa").html(data);
                    var sentencia="";
                   // data.forEach(function (item){
                        sentencia ='"'+'<a href="view/docs/'+data.nombre+'"'+'>abrir docmuento '+data.nombre+'</a>"';
                       // alert(sentencia);
                       $("#muestraActa").html(sentencia);
                       $("#tituloResultDocumento").html(data.titulo);
                        $("#tituloResultfecha").html(data.fecha);
                        $("#tituloResultDescripcion").html(data.descripcion);
                   // });
               }
                },
                error: function (data) {
                    alert("No existe ninguna reunion con respecto a el datos ingresado");

                }
            });
});

/*----------------------------------------- ACTIVIDADES ------------------------------------------------
--------------------------------------------------------------------------------------------------------*/
function myFunctionActivities(t){
    var contador=0;
    $('#cargarHoraFinActividades option').remove();
    $('#otras_table tr').each(function () {
        if(contador == t.rowIndex){
            var hora = $(this).find("td").eq(0).html();
            var nombre = $(this).find("td").eq(2).html();
           // alert(nombre);

            $("#actividad_dayandhour_add").html(hora);
            $("#actividad_dayandhour2_add").html($("#fechaActividadConsultar").val());
            contador++;
            var h = parseInt(hora);
           // alert("h= "+h);
            for (i = h; i < 24; i++) {
                var x = document.getElementById("cargarHoraFinActividades");
                var option = document.createElement("option");
                option.value = i;
                option.text = i;
                x.add(option);
            }
            if(nombre != ""){
              //  alert("no estoy vacio");
                $('#modalAddActividades').modal('toggle');
            }
            
        }else{
            contador++;
        }      
    });
}
/*verifica si un objeto esta dentro de un arreglo*/
function contains(a, obj) {
    for (var i = 0; i < a.length; i++) {
        if (a[i] == obj) {
            return true;
        }
    }
    return false;
}

function cargaCalendarioActividades(fecha){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "index.php",
        data: {
            methodNameA: "cargaCaledarioDeActividades",
            fechaConsulta: fecha
        },
        success: function (data) {
            $("#otras_table tbody tr").remove();
               // alert(data);
            
                if(data == "{[]}" || data == "" || data == "[]"){
                    var acti="";
                    for (i = 0; i < 24; i++) {
                        var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddActividades' onclick='myFunctionActivities(this)' ><td>" +
                        i + "</td><td>" +
                        i+':00' + "</td><td>" +
                        acti + "</td></tr>" 
                        $("#otras_table").append(nuevafila);
                    }
                }else{
                    var vector = new Array(); 
                    data.forEach(function (item) {
                       // alert(item.hour);
                        vector.push(item.hour);
                    });
                    for (i = 0; i < 24; i++) {
                        //alert(i);
                        var pintado=0;
                        data.forEach(function (item) {
                          //  alert(item.hour +"="+ i);
                            
                        if(item.hour == i){
                            var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddActividades' onclick='myFunctionActivities(this)' ><td>" +
                            item.hour + "</td><td>" +
                            item.hour+':00' + "</td><td>" +
                            item.name + "</td></tr>" 
                            $("#otras_table").append(nuevafila);
                            pintado=1;
                        }else{
                            if(pintado== 0) {
                                if(!contains(vector, i)){
                                    var acti="";
                                    var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddActividades' onclick='myFunctionActivities(this)' ><td>" +
                                    i + "</td><td>" +
                                    i+':00' + "</td><td>" +
                                    acti + "</td></tr>" 
                                    $("#otras_table").append(nuevafila); 
                                    pintado=1;
                                }
                                
                            }
                            
                        }
                        });
                    }/*for*/
                }/*else*/
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
        },
    });
}

$("#consultarAActividad").click(function(){
    //alert($("#fechaActividadConsultar").val());
    cargaCalendarioActividades($("#fechaActividadConsultar").val());
});

/*--------------agregar actividades modal----------*/

$("#btn_actividad_add").click(function(){
     $("#result_actividad_add").html("");
    if($("#actividad_nombre_agregar").val()==""){
        $("#result_actividad_add").html("Tienes que poner un nombre a la actividad para guardar");
    }else{
    var hora = $("#actividad_dayandhour_add").html();
    var dia = $("#actividad_dayandhour2_add").html();
   // alert(dia+" "+ hora);
    $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    methodNameA: "addActivities",
                    day: dia,
                    hour: hora,
                    name: $("#actividad_nombre_agregar").val(),
                    hourFin: $("#cargarHoraFinActividades").val()
                },
                success: function (data) {
                    $("#result_actividad_add").html(data);
                    cargaCalendarioActividades(dia);
                },
                error: function (data) {
                    console.log("error");

                }
            });
}
});
/*----------------////////////------MANEJO DEL RESERVA SALON------/////////////------------------------*/
function myFunctionSalonActivities(t){
    var contador=0;
    $('#cargarHoraFinActividadesSalon option').remove();
    $('#salon_table tr').each(function () {
        if(contador == t.rowIndex){
            var hora = $(this).find("td").eq(0).html();
            var nombre = $(this).find("td").eq(2).html();
           // alert(nombre);

            $("#actividadSalon_dayandhour_add").html(hora);
            $("#actividadSalon_dayandhour2_add").html($("#fechaSalonConsultar").val());
            contador++;
            var h = parseInt(hora);
           // alert("h= "+h);
            for (i = h; i < 24; i++) {
                var x = document.getElementById("cargarHoraFinActividadesSalon");
                var option = document.createElement("option");
                option.value = i;
                option.text = i;
                x.add(option);
            }
            if(nombre != ""){
                //alert("no estoy vacio");
                //$('#modalAddActividades').modal('toggle');
                $('#contentReservSalon').addClass('hide');
                $('#cancelaciondereserva').removeClass('hide');
            }else{
                $('#cancelaciondereserva').addClass('hide');
                $('#contentReservSalon').removeClass('hide'); 
            }
            
        }else{
            contador++;
        }      
    });
}

function cargaCalendarioSalonActividades(fecha){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "index.php",
        data: {
            methodNameA: "cargaCaledarioSalonActividades",
            fechaConsulta: fecha
        },
        success: function (data) {
            $("#salon_table tbody tr").remove();
               // alert(data);
            
                if(data == "{[]}" || data == "" || data == "[]"){
                    var acti="";
                    for (i = 0; i < 24; i++) {
                        var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddSalon' onclick='myFunctionSalonActivities(this)' ><td>" +
                        i + "</td><td>" +
                        i+':00' + "</td><td>" +
                        acti + "</td></tr>" 
                        $("#salon_table").append(nuevafila);
                    }
                }else{
                    var vector = new Array(); 
                    data.forEach(function (item) {
                       // alert(item.hora);
                        vector.push(item.hora);
                    });
                    for (i = 0; i < 24; i++) {
                        //alert(i);
                        var pintado=0;
                        data.forEach(function (item) {
                          //  alert(item.hour +"="+ i);
                            
                  /*@*/      if(item.hora == i){ 
                   // alert("entre");
                            var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddSalon' onclick='myFunctionSalonActivities(this)' ><td>" +
                            item.hora + "</td><td>" +
                            item.hora+':00' + "</td><td>" +
                            item.nombrePersona + "</td></tr>" 
                            $("#salon_table").append(nuevafila);
                            pintado=1;
                        }else{
                            if(pintado== 0) {
                                if(!contains(vector, i)){
                                    var acti="";
                                    var nuevafila= "<tr data-placement='bottom' data-toggle='modal' data-target='#modalAddSalon' onclick='myFunctionSalonActivities(this)' ><td>" +
                                    i + "</td><td>" +
                                    i+':00' + "</td><td>" +
                                    acti + "</td></tr>" 
                                    $("#salon_table").append(nuevafila); 
                                    pintado=1;
                                }
                                
                            }
                            
                        }
                        });
                    }/*for*/
                }/*else*/
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
        },
    });
}




$("#consultarASalon").click(function(){
  //  alert($("#fechaSalonConsultar").val());
    cargaCalendarioSalonActividades($("#fechaSalonConsultar").val());
});

/*--------------agregar actividades SALON modal----------*/
var totalServivosSalon=0;
var descripcionServicios="";
var numFcat="";
$("#btn_salon_add").click(function(){
    $("#result_salon_add").html("");
    if($("#salon_nombrePersona").val()=="" || $("#tarjetaSalon").val()=="" || $("#salon_email").val()==""){
        alert("todos los campos son requeridos");
    }else{
    var hora = $("#actividadSalon_dayandhour_add").html();
    var dia = $("#actividadSalon_dayandhour2_add").html();
   // alert(dia+" "+ hora);
    $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    methodNameA: "addSalonActivities",
                    day: dia,
                    hour: hora,
                    namePerson: $("#salon_nombrePersona").val(),
                    email: $("#salon_email").val(),
                    tarjeta: $("#tarjetaSalon").val(),
                    hourFin: $("#cargarHoraFinActividadesSalon").val(),
                    servicios : descripcionServicios,
                    total: totalServivosSalon,
                    fact: numFcat,
                },
                success: function (data) {
                    $("#result_salon_add").html(data);
                    cargaCalendarioSalonActividades(dia);
                    $("#salon_nombrePersona").val("");
                    $("#tarjetaSalon").val("");
                    $("#salon_email").val("");
                    $("#id_cantidad_mesas").val("0");
                    $("#id_cantidad_sillas").val("0");
                },
                error: function (data) {
                    console.log("error");

                }
            });
}
});

$("#btn_salon_precio").click(function(){
    if(parseInt($("#id_cantidad_mesas").val())<0 && parseInt($("#id_cantidad_sillas").val())<0){
        alert("Los numeros no puedern ser menores a 0");
    }else{
    var total =0;
    var desgloceMonto ="";
    var cantidadMesas= $("#id_cantidad_mesas").val();
   // alert("cantidad de mesas "+ cantidadMesas);
    var cantidadSillas= $("#id_cantidad_sillas").val();
  //  alert("cantidadSillas"+ cantidadSillas);
    var catidadMerienda = $("#cantidadMerienda").val();
  //  alert("catidadMerienda "+catidadMerienda);
    var catidadPlatosDeComida = $("#cantidadPlatosFuerte").val();
  //  alert("catidadPlatosDeComida "+catidadPlatosDeComida);

    var totalmesas = parseInt(cantidadMesas)*1000;
    total = parseInt(total)+ parseInt(totalmesas);
    var totalsillas = parseInt(cantidadSillas)*100;
    total = parseInt(total)+ parseInt(totalsillas);

    var totalConMerienda = parseInt(cantidadSillas)*2000;
    totalConMerienda = parseInt(totalConMerienda)* parseInt(catidadMerienda);
    total = parseInt(total) +parseInt(totalConMerienda);
   // alert("total"+total);

    var totalConFuerte = parseInt(cantidadSillas)*3000;
  //  alert("totalConFuerte"+ totalConFuerte);
    totalConFuerte = parseInt(totalConFuerte) * parseInt(catidadPlatosDeComida);
    total = parseInt(total) +parseInt(totalConFuerte);
  //  alert("total"+ total);


    if($('#chechboxManteleria').prop('checked')) {
        var totalManteleria  = parseInt(cantidadMesas)*2000;
        total = parseInt(total) +parseInt(totalManteleria);
    }
    var inicio = $("#actividadSalon_dayandhour_add").html();
    var fin= $("#cargarHoraFinActividadesSalon").val();
    var cantidadHoras =0;
    for (var i = parseInt(inicio); i <= parseInt(fin); i++) {
            cantidadHoras ++;
    }
    var montoReserva = parseInt(cantidadHoras)*5000;
    total = parseInt(total)+montoReserva;
   numFcat= Math.round(Math.random() * (999999999999 - 1000000000) + 1000000000);
  // alert("factra "+numFcat);
    totalServivosSalon = parseInt(total)*0.20;
    desgloceMonto = "Numero Factura = "+numFcat+"\n"+"\n"+
                    "Cantidad de mesas: "+cantidadMesas+" = ₡ "+totalmesas+"\n"+
                    "Cantidad de sillas: "+cantidadSillas+" = ₡ "+totalsillas+"\n"+
                    "Cantidad de meriendas por persona(reposteria y cafe o frutas): "+catidadMerienda+" = ₡ "+totalConMerienda+"\n"+
                    "Cantidad platos fuerte por persona: "+catidadPlatosDeComida+" = ₡ "+totalConFuerte+"\n"+
                    "Servicio manteleria = ₡ "+totalManteleria+"\n"+
                    "Horas de reserva del salon: "+cantidadHoras+ " = ₡ "+montoReserva+"\n"+
                    "Gran Total = ₡ "+total+"\n"+
                    "Monto que se rebajara de su tarjeta automaticamente(20%) = ₡ "+ totalServivosSalon;
    
    $("#resultado_precio").html("Total= ₡ "+total+" y rebeajo del 20%= ₡"+ totalServivosSalon);

    descripcionServicios = desgloceMonto;
}
});

/*----------------- Cancelacion del modal ---------------------*/
$("#btn_cancelar_salon").click(function(){
     $("#resultcancelacionid").html("");
     $.ajax({
        url: "index.php",
        type: "POST",
            data: {
            methodNameA: "cancelarReserva",
            fecha: $("#fechaSalonConsultar").val(),
            numFactura: $("#numeroFacturaConsulta").val()
        },
            success: function (data) {
                $("#resultcancelacionid").html(data);
                cargaCalendarioSalonActividades($("#fechaSalonConsultar").val());
            },
            error: function (data) {
                 console.log("error");

            }
    });
});

/*------------------------------------ GASTOS INGRESOS CONSULTA -----------------------------------
----------------------------------------------------------------------------------------------------*/
$("#btnAddIngreso").click(function(){
    $.ajax({
        url: "index.php",
        type: "POST",
            data: {
            methodNameCC: "addIngresos",
            fecha: $("#fechaIngreso").val(),
            motivo: $("#motivoIngreso").val(),
            monto: $("#montoIngreso").val()
        },
            success: function (data) {
                $("#resultidingresos").html(data);
                $("#motivoIngreso").val("");
                $("#montoIngreso").text("");
                $("#motivoIngreso").text("");
                $("#montoIngreso").val("");
            },
            error: function (data) {
                 console.log("error");

            }
    });
});

$("#btnAddGasto").click(function(){
    $.ajax({
        url: "index.php",
        type: "POST",
            data: {
            methodNameCC: "addGastos",
            fecha: $("#fechaGasto").val(),
            motivo: $("#motivoGasto").val(),
            monto: $("#montoGasto").val()
        },
            success: function (data) {
                $("#resultidgastos").html(data);
                $("#motivoGasto").val("");
                $("#motivoGasto").text("");
                $("#montoGasto").val("");
                $("#montoGasto").text("");
            },
            error: function (data) {
                 console.log("error");

            }
    });
});

$("#btnidreporte").click(function(){
    $("#resultRegistroCajaChicaNo").html("");
    $.ajax({
        url: "index.php",
        type: "POST",
        dataType: "JSON",
            data: {
            methodNameCC: "getReporteCajaChica",
            mes: $("#selectidmesreporte").val(),
            year: $("#selectidanoreporte").val()
        },
            success: function (data) {
                if(data =="" || data=="{[]}" || data=="[]"){
                    $("#reporte_table tbody tr").remove();
                    $("#resultRegistroCajaChicaNo").html("No hay ningun movimiento para ese mes");
                }else{
                $("#reporte_table tbody tr").remove();
                data.forEach(function (item) {
                    var nuevafila= "<tr><td>" +
                    item.fecha + "</td><td>" +
                    item.motivo + "</td><td>" +
                    item.tipo + "</td><td>" +
                    item.monto  + "</td></tr>"
         
                    $("#reporte_table").append(nuevafila);    
                });
            }
            },
            error: function (data) {
                 console.log("error");

            }
    });
});

$("#btn_cc_ingresos").click(function(){
    $("#resultRegistroCajaChicaNo").html("");
});
$("#btn_cc_gastos").click(function(){
    $("#resultRegistroCajaChicaNo").html("");
});
$("#btn_resporte_cc").click(function(){
});

