var tabla;
var instance;

function initi(){
	$('#nombre').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');
    listar();
    mostrarform(false);
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	
}

document.addEventListener("DOMContentLoaded", function(e) {
	// seachable 
	var options = {
		searchable: true,
		searchtext: 'Seleccione una opción...'
	};
	instance = NiceSelect.bind(document.getElementById("categoria"), options);
	$.post("../src/categoria.php?op=5", function(r){
	    $("#categoria").html(r);
		instance.update();
	});
});

//Función mostrar formulario
function mostrarform(flag)
{
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#idsubcategoria").val("");
}

function listar(){
    tabla=$('#tbllistado').DataTable(
        {
            language: {
				url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
			},
			lengthMenu: [10, 25, 50, 75, 100],
			Processing: true,
			ServerSide: true,
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
			
            buttons: [ ],
            "ajax":
                    {
                        url: '../src/subcategoria.php?op=0',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "Destroy": true,
            "iDisplayLength": 10,//Paginación
            "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
			columnDefs: [{
				width: "100px",
				targets: 2
			},
			{
				width: "100px",
				targets: 3
			}
			]
        });
}

function mostrar(idsubcategoria)
{
	$.post("../src/subcategoria.php?op=4",{idsubcategoria : idsubcategoria}, function(data, status)
	{
		data = JSON.parse(data);
		console.log(data);
		mostrarform(true);
		$("#nombre").val(data.subcategorianombre);
		instance = NiceSelect.bind(document.getElementById("categoria"));
		$.post("../src/categoria.php?op=5", function(r){
			$("#categoria").html(r);
			console.log(r);
			$('[name=categoria]').val(data.idcategoria);
		});
 		$("#idsubcategoria").val(data.idsubcategoria);
 	});
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../src/subcategoria.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {    
            console.log(datos);
			mensaje=datos.split(":");
			if(mensaje[0]=="1"){           
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'
				);   
				mostrarform(false);
				tabla.ajax.reload();          
			}
			else{
				Swal.fire({
					icon: "error",
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
			}
	    }

	});
	limpiar();
}

//Función para desactivar registros
function desactivar(idsubcategoria)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea desactivar el Registro?",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Desactivar'
	}).then((result) => {
		if (result.value) {
			$.post("../src/subcategoria.php?op=2", {idsubcategoria : idsubcategoria}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	});   
}

//Función para activar registros
function activar(idsubcategoria)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea activar el Registro?",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Activar'
	}).then((result) => {
		if (result.value) {
			$.post("../src/subcategoria.php?op=3", {idsubcategoria : idsubcategoria}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	}); 
}

initi();