$(document).ready(function() {

	// Si no existe ninguna cookie, mostramos el aviso de cookies
	if (getCookie("Nombre") == "") {
		$("div.alert").addClass("show");
	}

	// Función necesaria para habilitar los elementos tooltip de Bootstrap
	$("[data-toggle='tooltip']").tooltip({
		container: 'body'
	});

	// Comprobamos si el usuario aceptó las cookies, de ser así no volvemos a mostrar el aviso de estas
	$("span#cookies").click(function() {
		setCookie("Nombre", "nombre");
	});

	// Cuando se envie el formulario, verificamos si tiene activado el check de recordar
	$("form").submit(function() {



	});

	//
	$("a#inicia").click(function() {
		$("#entrar").modal("show");
	});

	$("a#registrar").click(function() {
		$("#registro").modal("show");
	});

	$("form#setDatos input").on("keyup", function() {

		if ($(this).val() != "") {
			$("form#setDatos input[type='submit']").removeAttr("disabled");
		} else {
			$("form#setDatos input[type='submit']").attr("disabled", "true");
		}

	});

	$("input[value='Eliminar']").click(function() {

		$("span#correo").text($(this).parent().parent().find("input").val());
		$("form#accion input[value='']").val($(this).parent().parent().find("input").val());

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