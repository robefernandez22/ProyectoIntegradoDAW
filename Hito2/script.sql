/*
    ANOTACIONES:

    1. Los campos 'garaje', 'piscina', 'wifi' y 'aire_acondicionado' de la tabla 'hoteles'
    y los campos 'vistas' y 'television' de la tabla 'habitaciones'
    son de tipo CHAR con la idea de que los valores sean 'S' de 'SI' o 'N' de 'NO'.

    2. El campo 'tipo' de la tabla 'usuarios' es de tipo CHAR
    con la idea de que tenga el valor 'A' de Administrador o
    'U' de Usuario, el cual será un usuario normal.

    3. Los campos 'calle', 'numero' y 'cod_postal' forman la ubicación
    donde se encuentra cada hotel.
*/

/* Creación de la base de datos */
DROP DATABASE IF EXISTS hoteles_ese;
CREATE DATABASE hoteles_ese;
use hoteles_ese;

/* Creación de las tablas */

/* Creación de la tabla HOTELES */
CREATE TABLE HOTELES (
    id                   INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre               VARCHAR(50) NOT NULL,
    descripcion          VARCHAR(100) NOT NULL,
    ciudad               VARCHAR(50) NOT NULL,
    calle                VARCHAR(50) NOT NULL,
    numero               INTEGER NOT NULL,
    cod_postal           INTEGER NOT NULL,
    estrellas            INTEGER NOT NULL,
    num_habitaciones     INTEGER NOT NULL,
    garaje               CHAR(1) NOT NULL,
    piscina              CHAR(1) NOT NULL,
    wifi                 CHAR(1) NOT NULL,
    aire_acondicionado   CHAR(1) NOT NULL
);

/* Inserciones en la tabla HOTELES */
INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `NUM_HABITACIONES`, `GARAJE`, `PISCINA`, `WIFI`, `AIRE_ACONDICIONADO`)
VALUES (NULL, 'Monterrey Costa', 'Hotel en primera línea de playa', 'Cádiz', 'Paseo Costa de la Luz', '55', '11550', '3', '45', 'S', 'N', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `NUM_HABITACIONES`, `GARAJE`, `PISCINA`, `WIFI`, `AIRE_ACONDICIONADO`)
VALUES (NULL, 'Hotel Polígono Sur', 'Hotel en el mejor barrio de Sevilla', 'Sevilla', 'Calle Esclava del Señor', '2', '41013', '5', '100', 'S', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `NUM_HABITACIONES`, `GARAJE`, `PISCINA`, `WIFI`, `AIRE_ACONDICIONADO`)
VALUES (NULL, 'Hotel 3', 'Ejemplo de descripción del Hotel 3', 'Madrid', 'Av. de Concha Espina', '1', '28036', '5', '200', 'S', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `NUM_HABITACIONES`, `GARAJE`, `PISCINA`, `WIFI`, `AIRE_ACONDICIONADO`)
VALUES (NULL, 'Design Plus Bex Hotel', 'Ejemplo de descripción del Hotel 4', 'Las Palmas de Gran Canaria', 'Calle León y Castillo', '330', '35007', '4', '120', 'S', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `NUM_HABITACIONES`, `GARAJE`, `PISCINA`, `WIFI`, `AIRE_ACONDICIONADO`)
VALUES (NULL, 'Hotel Zenit Barcelona', 'Ejemplo de descripción del Hotel 5', 'Barcelona', 'Carrer de Santaló', '8', '08021', '5', '320', 'N', 'S', 'S', 'S');

/* Creación de la tabla IMAGENES_HOTELES */
CREATE TABLE IMAGENES_HOTELES (
    id            INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    img_path      VARCHAR(20) NOT NULL,
    hoteles_id    INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id)
);

/* Inserción en la tabla IMAGENES_HOTELES */
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img1.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img2.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img3.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img4.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img5.jpg', '3');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, 'C:\\hoteles\\img6.jpg', '3');

/* Creación de la tabla TIPOS_ALOJAMIENTOS */
CREATE TABLE TIPOS_ALOJAMIENTOS (
    id            INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion   VARCHAR(100) NOT NULL
);

/* Inserciones en la tabla TIPOS_ALOJAMIENTOS */
INSERT INTO `HOTELES_ESE`.`TIPOS_ALOJAMIENTOS` (`ID`, `DESCRIPCION`) VALUES (NULL, 'Familiar');
INSERT INTO `HOTELES_ESE`.`TIPOS_ALOJAMIENTOS` (`ID`, `DESCRIPCION`) VALUES (NULL, 'Individual');
INSERT INTO `HOTELES_ESE`.`TIPOS_ALOJAMIENTOS` (`ID`, `DESCRIPCION`) VALUES (NULL, 'Doble');

/* Creación de la tabla HABITACIONES */
CREATE TABLE HABITACIONES (
    id                      INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    num_habitacion          INTEGER NOT NULL,
    precio_noche            FLOAT NOT NULL,
    num_camas               INTEGER NOT NULL,
    descripcion             VARCHAR(100) NOT NULL,
    num_planta              INTEGER NOT NULL,
    vistas                  CHAR(1) NOT NULL,
    television              CHAR(1) NOT NULL,
    hoteles_id              INTEGER NOT NULL,
    tipos_alojamientos_id   INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id),
    FOREIGN KEY (tipos_alojamientos_id) REFERENCES tipos_alojamientos (id)
);

/* Inserciones en la tabla HABITACIONES */

/* Habitaciones del Hotel con el ID 1 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '1', '30', '2', 'Habitación doble', '1', 'N', 'S', '1', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', '1', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', '1', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', '1', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', '1', '1');

/* Habitaciones del Hotel con el ID 2 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '1', '30', '2', 'Habitación doble', '1', 'N', 'S', '2', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', '2', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', '2', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', '2', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', '2', '1');

/* Habitaciones del Hotel con el ID 3 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '1', '30', '2', 'Habitación doble', '1', 'N', 'S', '3', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', '3', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', '3', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', '3', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', '3', '1');

/* Habitaciones del Hotel con el ID 4 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '1', '30', '2', 'Habitación doble', '1', 'N', 'S', '4', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', '4', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', '4', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', '4', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', '4', '1');

/* Habitaciones del Hotel con el ID 5 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '1', '30', '2', 'Habitación doble', '1', 'N', 'S', '5', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', '5', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', '5', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', '5', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `HOTELES_ID`, `TIPOS_ALOJAMIENTOS_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', '5', '1');

/* Creación de la tabla IMAGENES_HABITACIONES */
CREATE TABLE IMAGENES_HABITACIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    img_path          VARCHAR(20) NOT NULL,
    habitaciones_id   INTEGER NOT NULL,
    FOREIGN KEY (habitaciones_id) REFERENCES habitaciones (id)
);

/* Inserción en la tabla IMAGENES_HABITACIONES */
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img1.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img2.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img3.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img4.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img5.jpg', '3');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, 'C:\\habitaciones\\img6.jpg', '3');

/* Creación de la tabla USUARIOS */
CREATE TABLE USUARIOS (
    correo      VARCHAR(100) NOT NULL PRIMARY KEY,
    nombre      VARCHAR(50) NOT NULL,
    apellidos   VARCHAR(100) NOT NULL,
    password    VARCHAR(20) NOT NULL,
    tipo        CHAR(1) NOT NULL
);

/* Inserciones en la tabla USUARIOS */
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('clara.mesa@iespoligonosur.org', 'Clara', 'Mesa Fonseca', 'disenioInterfaces', 'A');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('concepcion.guisado@iespoligonosur.org', 'Concepción', 'Guisado Jurado', 'desarrolloServidor', 'A');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('robertofernandezromero61@gmail.com', 'Roberto', 'Fernández Romero', 'alumnoDAW', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('mercedes.florido@iespoligonosur.org', 'Mercedes', 'Florido Berrocal', 'desarrolloCliente', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('diego.fernandez@iespoligonosur.org', 'Diego Jesús', 'Fernández Raposo', 'despliegueWeb', 'U');

/* Creación de la tabla TIPOS_PENSIONES */
CREATE TABLE TIPOS_PENSIONES (
    id            INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion   VARCHAR(30) NOT NULL,
    precio        FLOAT NOT NULL,
    hoteles_id    INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id)
);

/* Inserciones en la tabla TIPOS_PENSIONES */
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Pensión Completa', '50', '1');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Media Pensión', '25', '1');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Desayuno', '12', '1');

INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Pensión Completa', '75', '2');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Media Pensión', '50', '2');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Desayuno', '25', '2');

INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Pensión Completa', '85', '3');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Media Pensión', '75', '3');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Desayuno', '50', '3');

INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Pensión Completa', '100', '4');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Media Pensión', '85', '4');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Desayuno', '75', '4');

INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Pensión Completa', '110', '5');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Media Pensión', '85', '5');
INSERT INTO `HOTELES_ESE`.`TIPOS_PENSIONES`(`ID`, `DESCRIPCION`, `PRECIO`, `HOTELES_ID`) VALUES (NULL, 'Desayuno', '75', '5');

/* Creación de la tabla RESERVAS */
CREATE TABLE RESERVAS (
    id                           INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fecha_reserva                DATE NOT NULL,
    fecha_entrada                DATE NOT NULL,
    fecha_salida                 DATE,
    num_personas				 INTEGER NOT NULL,
    usuarios_correo              VARCHAR(100) NOT NULL,
    tipos_pensiones_id           INTEGER NOT NULL,
    FOREIGN KEY (usuarios_correo) REFERENCES usuarios (correo),
    FOREIGN KEY (tipos_pensiones_id) REFERENCES tipos_pensiones (id)
);

/* Inserciones en la tabla RESERVAS */
INSERT INTO `HOTELES_ESE`.`RESERVAS`(`ID`, `FECHA_RESERVA`, `FECHA_ENTRADA`, `FECHA_SALIDA`, `NUM_PERSONAS`, `USUARIOS_CORREO`, `TIPOS_PENSIONES_ID`)
VALUES (NULL, '2019-04-30 00:00:00', '2019-05-01 00:00:00', 
'2019-05-10 00:00:00', '2', 'robertofernandezromero61@gmail.com', '2');

INSERT INTO `HOTELES_ESE`.`RESERVAS`(`ID`, `FECHA_RESERVA`, `FECHA_ENTRADA`, `FECHA_SALIDA`, `NUM_PERSONAS`, `USUARIOS_CORREO`, `TIPOS_PENSIONES_ID`)
VALUES (NULL, '2019-04-30 00:00:00', '2019-05-19 00:00:00', 
'2019-05-23 00:00:00', '1', 'mercedes.florido@iespoligonosur.org', '6');

INSERT INTO `HOTELES_ESE`.`RESERVAS`(`ID`, `FECHA_RESERVA`, `FECHA_ENTRADA`, `FECHA_SALIDA`, `NUM_PERSONAS`, `USUARIOS_CORREO`, `TIPOS_PENSIONES_ID`)
VALUES (NULL, '2019-04-30 00:00:00', '2019-05-26 00:00:00', 
'2019-05-29 00:00:00', '4', 'diego.fernandez@iespoligonosur.org', '13');

/* Creación de la tabla RESERVAS_HABITACIONES */
CREATE TABLE RESERVAS_HABITACIONES (
    reservas_id       INTEGER NOT NULL,
    habitaciones_id   INTEGER NOT NULL,
    FOREIGN KEY (reservas_id) REFERENCES reservas (id),
    FOREIGN KEY (habitaciones_id) REFERENCES habitaciones (id)
);

/* Inserciones en la tabla RESERVAS_HABITACIONES */
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('1', '1');
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('2', '2');
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('3', '3');

/* Creación de la tabla VALORACIONES */
CREATE TABLE VALORACIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion       VARCHAR(100) NOT NULL,
    puntuacion        INTEGER NOT NULL,
    fecha             DATE NOT NULL,
    hoteles_id        INTEGER NOT NULL,
    usuarios_correo   VARCHAR(100) NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id),
    FOREIGN KEY (usuarios_correo) REFERENCES usuarios (correo)
);

/* Inserciones en la tabla VALORACIONES */
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`)
VALUES (NULL, 'El mejor hotel en el que he estado', '5', '2019-05-10 00:00:00', '1', 'robertofernandezromero61@gmail.com');
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`)
VALUES (NULL, 'El peor hotel en el que he estado', '1', '2019-05-23 00:00:00', '2', 'mercedes.florido@iespoligonosur.org');
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`)
VALUES (NULL, 'El Wi-Fi era muy fácil de hackear', '5', '2019-05-29 00:00:00', '5', 'diego.fernandez@iespoligonosur.org');