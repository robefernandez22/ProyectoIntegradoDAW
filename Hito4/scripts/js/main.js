$(document).ready(function() {

	// Si no existe ninguna cookie, mostramos el aviso de cookies
	if (getCookie("correo") == "") {

		$("div.alert").addClass("show");

	} else if (getCookie("correo") != "correo" && getCookie("password") != "password") {

		$("input#inputEmail").val(Base64.decode(getCookie("correo")));
		$("input#password").val(Base64.decode(getCookie("password")));
		$("#recordar").attr("checked", "true")

	}	

	// Función necesaria para habilitar los elementos tooltip de Bootstrap
	$("[data-toggle='tooltip']").tooltip({
		container: 'body'
	});

	// Comprobamos si el usuario aceptó las cookies, de ser así no volvemos a mostrar el aviso de estas
	$("span#cookies").click(function() {
		setCookie("correo", "correo");
		setCookie("password", "password");
	});

	// Cuando se envie el formulario, verificamos si tiene activado el check de recordar
	$("#recordar").change(function() {

		if ($(this).is(":checked")) {

			setCookie("correo", Base64.encode($("input#inputEmail").val()));
			setCookie("password", Base64.encode($("input#password").val()));

		} else {

			setCookie("correo", "correo");
			setCookie("password", "password");

		}

	});

	$("input[value='Eliminar']").click(function() {

		$("span.valor").text($(this).parent().parent().find("input.valor").val());
		$("form#accion input.identificador").val($(this).parent().parent().find("input.identificador").val());

	});

});

function setCookie(cname, cvalue) {

	var d = new Date();
	d.setTime(d.getTime() + (24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}

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