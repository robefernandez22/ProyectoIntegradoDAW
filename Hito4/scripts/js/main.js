$(document).ready(function() {

	// Si no existe ninguna cookie, mostramos el aviso de cookies
	if (getCookie("correo") == "") {

		$("div.alert").addClass("show");

	/* Si las cookies de correo y password son diferentes a los valores por defecto, mostramos
	los valores de esas cookies en cada campo correspondiente decodificando en Base 64 */
	} else if (getCookie("correo") != "correo" && getCookie("password") != "password") {

		$("input#inputEmail").val(Base64.decode(getCookie("correo")));
		$("input#password").val(Base64.decode(getCookie("password")));
		$("#recordar").attr("checked", "true")

	}	

	// Función necesaria para habilitar los elementos tooltip de Bootstrap
	$("[data-toggle='tooltip']").tooltip({

		container: 'body'

	});

	/* Comprobamos si el usuario aceptó las cookies, de ser así guardamos las cookies correo
	y password con valores por defecto */
	$("span#cookies").click(function() {
		setCookie("correo", "correo");
		setCookie("password", "password");
	});

	// Cada vez que el checkbox de recordar cambie, comprobaremos si está checkeado o no
	$("#recordar").change(function() {

		/* Si está checkeado, guardamos las cookies correo y password con los valores
		correspondientes y codificados en Base 64 */
		if ($(this).is(":checked")) {

			setCookie("correo", Base64.encode($("input#inputEmail").val()));
			setCookie("password", Base64.encode($("input#password").val()));

		} else {

			/* Si no está checkeado, guardamos las cookies con los valores por defecto */
			setCookie("correo", "correo");
			setCookie("password", "password");

		}

	});

	/* Esta función es para que cuando se quiera eliminar un hotel, usuario, etc..
	podamos coger ciertos valores necesarios para eliminar el registro en concreto */
	$("input[value='Eliminar']").click(function() {

		$("span.valor").text($(this).parent().parent().find("input.valor").val());
		$("form#accion input.identificador").val($(this).parent().parent().find("input.identificador").val());

	});

	$("select[name='filtro']").change(function() {

		$("select").hide();
		$("input").hide();
		$("select[name='filtro']").show();
		$("input[value='Eliminar']").show();
		$("input[value='Modificar']").show();
		$("input[value='Añadir']").show();

		if ($(this).val() == "usuario") {
			$("input#correo").show();
		} else if ($(this).val() == "hotel") {
			$("select#hoteles").show();
		} else if ($(this).val() == "fecha_reserva" || $(this).val() == "fecha_entrada" || $(this).val() == "fecha_salida") {
			$("select[name='orden']").show();
		}

	});

});

// Función para guardar/modificar cookies
function setCookie(cname, cvalue) {

	var d = new Date();
	d.setTime(d.getTime() + (24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}

// Función para obtener cookies
function getCookie(cname) {

	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');

		for(var i = 0; i <ca.length; i++) {

			var c = ca[i];

			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}

			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}

	return "";

}