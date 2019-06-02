$(document).ready(function() {

	$("#galeria a").fancybox({

		/* Color del fondo cuando se abra la imagen */
		overlayColor: "#797e79",
		/* Opacidad del fondo cuando se abra la imagen */
		overlayOpacity: .6,
		/* Efecto de las transiciones, tanto adelante como hacia atrás */
		transitionIn: "elastic",
		transitionOut: "elastic",
		/* Posición del título de la imagen */
		titlePosition: "Outside",
		/* Cuando llegue a la última imágen, pasará a la primera, entrando así en un ciclo */
		cyclic: true,
		/* Velocidad a la que se pasan las imágenes */
		changeSpeed: 1000,
		/* Velocidad a la que entra la imagen cuando se pulsa en ella */
		speedIn: 1000,
		/*  */
		easingIn: "easeInSine"

	});

});
