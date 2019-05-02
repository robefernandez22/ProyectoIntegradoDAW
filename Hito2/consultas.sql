/* Seleccionar todos los hoteles */
SELECT * FROM HOTELES;

/* Seleccionar todos los hoteles que estén(por ejemplo) en Madrid */
SELECT * FROM HOTELES WHERE CIUDAD LIKE 'SEVILLA';

/* Seleccionar todos los hoteles comprendidos entre una y tres estrellas */
SELECT * FROM HOTELES WHERE ESTRELLAS BETWEEN 1 AND 3;

/* Seleccionar las imágenes de un hotel en concreto */
SELECT IMG_PATH FROM IMAGENES_HOTELES WHERE HOTELES_ID = 1;

/* Seleccionar todas las habitaciones de un hotel en concreto */
SELECT * FROM HABITACIONES WHERE HOTELES_ID = 5;

/* Seleccionar todas las habitaciones de un hotel en concreto y sólo las familiares */
SELECT * FROM HABITACIONES WHERE HOTELES_ID = 3 AND DESCRIPCION LIKE 'FAMILIAR';

/* Seleccionar todas las habitaciones de un hotel en concreto, sólo las familiares 
y con un precio por noche comprendido entre 20 y 50 */
SELECT * FROM HABITACIONES WHERE HOTELES_ID = 2 AND DESCRIPCION LIKE 'FAMILIAR' AND PRECIO_NOCHE BETWEEN 20 AND 50;

/* Seleccionar todas las imágenes de una habitación en concreto */
SELECT IMG_PATH FROM IMAGENES_HABITACIONES WHERE HABITACIONES_ID = 1;

/* Seleccionar todas las valoraciones de un hotel en concreto */
SELECT U.NOMBRE, DESCRIPCION, PUNTUACION, FECHA FROM VALORACIONES, USUARIOS U WHERE HOTELES_ID = 2 AND U.CORREO LIKE USUARIOS_CORREO;

/* Seleccionar todas las valoraciones de un usuario en concreto */
SELECT DESCRIPCION, PUNTUACION, FECHA FROM VALORACIONES WHERE USUARIOS_CORREO LIKE 'diego.fernandez@iespoligonosur.org';

/* Seleccionar todas las reservas */
SELECT U.CORREO, U.NOMBRE, U.APELLIDOS, R.FECHA_RESERVA, R.FECHA_ENTRADA,
R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION,
HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, TA.DESCRIPCION
FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, TIPOS_ALOJAMIENTOS TA, RESERVAS_HABITACIONES RH
WHERE U.CORREO LIKE R.USUARIOS_CORREO
AND R.ID = RH.RESERVAS_ID
AND HO.ID = TP.HOTELES_ID
AND HA.ID = RH.HABITACIONES_ID
AND TP.ID = R.TIPOS_PENSIONES_ID
AND TA.ID = HA.TIPOS_ALOJAMIENTOS_ID;

/* Seleccionar todas las reservas de una habitación en concreto */
SELECT U.CORREO, U.NOMBRE, U.APELLIDOS, R.FECHA_RESERVA, R.FECHA_ENTRADA,
R.FECHA_SALIDA, R.NUM_PERSONAS, HO.NOMBRE, HA.DESCRIPCION, HA.NUM_HABITACION,
HA.NUM_PLANTA, HA.PRECIO_NOCHE, HA.NUM_CAMAS, TP.DESCRIPCION, TP.PRECIO, TA.DESCRIPCION
FROM USUARIOS U, RESERVAS R, HOTELES HO, HABITACIONES HA, TIPOS_PENSIONES TP, TIPOS_ALOJAMIENTOS TA, RESERVAS_HABITACIONES RH
WHERE U.CORREO LIKE R.USUARIOS_CORREO
AND R.ID = RH.RESERVAS_ID
AND HO.ID = HA.HOTELES_ID
AND HO.ID = TP.HOTELES_ID
AND HA.ID = 1
AND TP.ID = R.TIPOS_PENSIONES_ID
AND TA.ID = HA.TIPOS_ALOJAMIENTOS_ID;