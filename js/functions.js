function getDatesAndTimesToAdd(){
	var pfechadd = $('#pfecha').val();
	var sfechaadd = $('#sfecha').val();

	console.log(pfechadd,sfechaadd);
}


function getDnTtofilter(){
	var pfecha = $('#pfecha').val();
	var ptime = "00:00:00";
	var sfecha = $('#sfecha').val();
	var stime = "23:59:59";

	console.log(pfecha,ptime,sfecha,stime);

}

function editEvent(id){
	window.location = "editevent.php?id="+id;
}
function displayHide() {
	$('#addev').hide();
}
function displayShow() {
    $('#addev').show();
}


function setDir(){
		var direccionn = $('#ubicacionW').val();

		$.ajax({
            url : './api/api-events.php',
            type : 'post',
            dataType: 'json',
            contentType: 'application/json',
            data : JSON.stringify({
                action : 'getUbicaciones'
            }),
            beforeSend: function(){
                console.log("getting ubis");
            },
            success : function( response ) {
             	response.forEach(function(value,index){
             		if(value.idubicacion == direccionn){
             			console.log("True: " + value.idubicacion + " == " + direccionn,value.idubicacion == direccionn);
						$('#direccion').val(value.direccion);
             		}
             	});
          }
        });

}

function registerEvent(){

    var tipoevento = $('#eventtype').val();
    var fecha = $('#pfechaadd').val();
    var cantinvitados = $('#cantinvitados').val();
    var nombreevento = $('#nombreevento').val();
    var hora_inicio = $('#ptimeadd').val();
    var hora_fin = $('#stimeadd').val();
    var ubicacionevento = $('#ubicacionW').val();

    var nombrecliente = $('#nombreclienteadd').val();
    var ncontrato = $('#ncontratoadd').val();

    var descripcion = $('#descripcion').val();

    var c1 = tipoevento.length > 0;
    var c2 = fecha.length > 0;
    var c3 = cantinvitados.length > 0;
    var c4 = nombreevento.length > 0;
    var c5 = hora_inicio.length > 0;
    var c6 = hora_fin.length > 0;
    var c7 = ubicacionevento.length > 0;
    var c8 = nombrecliente.length > 0;
    var c9 = ncontrato.length > 0;
    var c10 = descripcion.length > 0;


    if(c1 && c2 && c3 && c4 && c5 && c6 && c7 && c8 && c9 && c10){

                $.ajax({
                    url : './api/api-events.php',
                    type : 'post',
                    dataType: 'json',
                    contentType: 'application/json',
                    data : JSON.stringify({
                        action : 'registerEvent',
                        tipoevento: tipoevento,
                        fecha: fecha,
                        cantinvitados: cantinvitados,
                        nombreevento: nombreevento,
                        hora_inicio: hora_inicio+":00",
                        hora_fin: hora_fin+":00",
                        urlinvitados: "0",
                        ubicacionevento: ubicacionevento,
                        nombreeventohtml: "0",
                        nombrecliente: nombrecliente,
                        ncontrato: ncontrato,
                        descripcion: descripcion,
                    }),
                    beforeSend: function(){
                        console.log("registering event");
                    },
                    error: function(error){
                        toastr.error('Ha ocurrido un error inesperado', 'Error');
                    },
                    success : function( response ) {
                        if(response){
                            toastr.success('Se ha registrado satisfactoriamente el evento', 'Evento añadido');
                            b2emptyregister();
                        }else{
                            toastr.error('Ha ocurrido un error inesperado en success', 'Error');
                        }
                  }
            });

        }else{
            toastr.error('Faltan parametros de registro', 'Error en parametros');
        }

    }

function b2emptyregister(){
    document.getElementById('eventtype').value = "";
    document.getElementById('pfechaadd').value = "";
    document.getElementById('cantinvitados').value = "";
    document.getElementById('nombreevento').value = "";
    document.getElementById('eventtype').value = "";
    document.getElementById('ptimeadd').value = "";
    document.getElementById('stimeadd').value = "";
    document.getElementById('ubicacionW').value = "";
    document.getElementById('direccion').value = "";
    document.getElementById('nombreclienteadd').value = "";
    document.getElementById('ncontratoadd').value = "";
    document.getElementById('descripcion').value = "";

    
    
}



function setDireccion(direccion){

	console.log("Hel dire");

	console.log(direccion);

}

function setSueldo(){
    var sueldo = $('#puesto').val();
    $('#sueldo').val(sueldo);
}


function updateEvent(){
    var idevento = $('#ideventoh').val();
    var tipoevento = $('#eventtype').val();
    var fecha = $('#pfechaadd').val();
    var cantinvitados = $('#cantinvitados').val();
    var nombreevento = $('#nombreevento').val();
    var hora_inicio = $('#ptimeadd').val();
    var hora_fin = $('#stimeadd').val();
    var ubicacionevento = $('#ubicacionW').val();

    var nombrecliente = $('#nombreclienteedit').val();
    var ncontrato = $('#ncontratoedit').val();

    var descripcion = $('#descripcion').val();

    var c1 = tipoevento.length > 0;
    var c2 = fecha.length > 0;
    var c3 = cantinvitados.length > 0;
    var c4 = nombreevento.length > 0;
    var c5 = hora_inicio.length > 0;
    var c6 = hora_fin.length > 0;
    var c7 = ubicacionevento.length > 0;
    var c8 = nombrecliente.length > 0;
    var c9 = ncontrato.length > 0;
    var c10 = descripcion.length > 0;

    if(c1 && c2 && c3 && c4 && c5 && c6 && c7 && c8 && c9 && c10){

                $.ajax({
                    url : './api/api-events.php',
                    type : 'post',
                    dataType: 'json',
                    contentType: 'application/json',
                    data : JSON.stringify({
                        action : 'updateEvent',
                        idevento: idevento,
                        tipoevento: tipoevento,
                        fecha: fecha,
                        cantinvitados: cantinvitados,
                        nombreevento: nombreevento,
                        hora_inicio: hora_inicio,
                        hora_fin: hora_fin,
                        urlinvitados: "0",
                        ubicacionevento: ubicacionevento,
                        nombreeventohtml: "0",
                        nombrecliente: nombrecliente,
                        ncontrato: ncontrato,
                        descripcion: descripcion,
                    }),
                    beforeSend: function(){
                        console.log("registering event");
                    },
                    error: function(error){
                        toastr.error('Ha ocurrido un error inesperado', 'Error');
                    },
                    success : function( response ) {
                        if(response){
                            toastr.success('Se ha actualizado satisfactoriamente el evento', 'Evento actualizado');
                        }else{
                            toastr.error('Ha ocurrido un error inesperado en success', 'Error');
                        }
                  }
            });

        }else{
            toastr.error('Faltan parametros de actualizacion', 'Error en parametros');
        }
}


function eraseEvent(id){
    $.ajax({
        url : './api/api-events.php',
        type : 'post',
        dataType: 'json',
        contentType: 'application/json',
        data : JSON.stringify({
                action : 'eraseEvent',
                id: id,
            }),
            beforeSend: function(){
                console.log("erasing event");
            },
            error: function(error){
                toastr.error('Ha ocurrido un error inesperado', 'Error');
            },
            success : function( response ) {
                if(response){
                    toastr.success('Evento borrado con exito', 'Evento borrado');
                    $('#modalborrar').modal('hide');
                    window.location = "admin.php?eventos&typepage=1";
                }else{
                    toastr.error('Ha ocurrido un error inesperado en success', 'Error');
                }
            }
    });
}


function openTabEdit(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


function showModalWithQrsOfEvent(numb){
    console.log("Numb",numb);
    $('#ideventonum').val(numb);
    $('#modalinfoqrs').modal('show');
    var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + numb + '&amp;size=50x50';
    $('#barcode').attr('src', url);
}

function getDatesLoc(){
    var fdate = $('#pfecha').val();
    var sdate = $('#sfecha').val();
    if (fdate.length > 0 && sdate.length > 0) {
        window.location = "admin.php?byrango&typepage=2&fdate="+fdate+"&sdate="+sdate;
    }else{
        toastr.warning("Ingrese ambas fechas correctamente","Error en fechas");
    }
}

function addInvitado(){
    var id = $('#ideventoh').val();
    var nombre = $('#nombreinvitado').val();
    console.log("Id: " + id,"Nombre: " + nombre);
    if (nombre.length > 0) {
        $.ajax({
        url : './api/api-invitados.php',
        type : 'post',
        dataType: 'json',
        contentType: 'application/json',
        data : JSON.stringify({
                action : 'registrarInvitado',
                id: id,
                nombre: nombre,
            }),
            beforeSend: function(){
                console.log("adding invitado");
            },
            error: function(error){
                toastr.error('Ha ocurrido un error inesperado', 'Error');
            },
            success : function( response ) {
                //console.log(response);
                if(response){
                    toastr.success('Invitado añadido al evento', 'Invitado agregado');
                    $('#modaladdinivitado').modal('hide');
                    window.location = "editevent.php?id="+id;
                }else{
                    toastr.error('Ha ocurrido un error inesperado', 'Error');
                }
            }
    });
    }else{
        toastr.warning("Ingrese el nombre del invitado","Error en parametro");
    }



}


function editInvitado(idinvitado,nombreinvitado){
    $('#modaleditinvitado').modal('show');
    $('#idinvitadotemp').val(idinvitado);
    $('#nombreinvitadoedit').val(nombreinvitado);
}

function updateInvitado(){
    var id = $('#ideventoh').val();   
    var idinvitado = $('#idinvitadotemp').val();
    var nombreinvitado = $('#nombreinvitadoedit').val();

    if(nombreinvitado.length > 0){
        $.ajax({
        url : './api/api-invitados.php',
        type : 'post',
        dataType: 'json',
        contentType: 'application/json',
        data : JSON.stringify({
                action : 'updateInvitado',
                id: idinvitado,
                nombre: nombreinvitado,
            }),
            beforeSend: function(){
                console.log("updating invitado");
            },
            error: function(error){
                toastr.error('Ha ocurrido un error inesperado', 'Error');
            },
            success : function( response ) {
                //console.log(response);
                if(response){
                    toastr.success('Invitado actualizado correctamente', 'Invitado actualizado');
                    $('#modaleditinvitado').modal('hide');
                    getBacktoEditEvent(id);
                }else{
                    toastr.error('Ha ocurrido un error inesperado en success', 'Error');
                }
            }
    });
    }
}

function eraseInvitado(idinvitado){
    var id = $('#ideventoh').val();
    if(idinvitado.length > 0){
        $.ajax({
        url : './api/api-invitados.php',
        type : 'post',
        dataType: 'json',
        contentType: 'application/json',
        data : JSON.stringify({
                action : 'deleteInvitado',
                id: idinvitado,
            }),
            beforeSend: function(){
                console.log("erasing invitado");
            },
            error: function(error){
                toastr.error('Ha ocurrido un error inesperado', 'Error');
            },
            success : function( response ) {
                //console.log(response);
                if(response){
                    toastr.success('Invitado borrado correctamente', 'Invitado borrado');
                    getBacktoEditEvent(id);
                }else{
                    toastr.error('Ha ocurrido un error inesperado en success', 'Error');
                }
            }
    });
    }else{
        toastr.error('Ha ocurrido un error inesperado con el id', 'Error');
    }
}

function getBacktoEditEvent(id){
    window.location = "editevent.php?id="+id;
}
/*

    

*/


//toastr.warning('Faltan parametros por llenar', 'Parametros incompletos');

    //toastr.success('Se ha registrado satisfactoriamente el evento', 'Evento añadido');

    //toastr.error('Ha ocurrido un error inesperado', 'Error');

    /*
    function changebg(){
        var bgid = $('#eventtype').val();
        console.log("Select " + bgid);
        switch(bgid){
            case "1":
                window.location = "admin.php?addevent&eventtype=b"
                break;
            case "2":
                window.location = "admin.php?addevent&eventtype=q"
                break;
            case "3":
                window.location = "admin.php?addevent&eventtype=c"
                break;
            default:
                console.log("Select def");
                break;
        }
    }
    */