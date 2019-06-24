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
    descripcion          VARCHAR(1000),
    ciudad               VARCHAR(50) NOT NULL,
    calle                VARCHAR(50) NOT NULL,
    numero               INTEGER NOT NULL,
    cod_postal           INTEGER NOT NULL,
    estrellas            INTEGER NOT NULL,
    garaje               CHAR(1) NOT NULL,
    piscina              CHAR(1) NOT NULL,
    wifi                 CHAR(1) NOT NULL
);

/* Inserciones en la tabla HOTELES */
INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Cádiz', 'Situado en Chipiona y con un centro de fitness y de bienestar. Este hotel de 4 estrellas también tiene recepción 24 horas, club infantil y 
3 piscinas al aire libre. Las habitaciones están equipadas con TV de pantalla plana, baño privado con bañera o ducha, artículos de aseo gratuitos y secador de pelo y escritorio.
Sirve un desayuno continental o buffet a diario y alberga un restaurante especializado en cocina internacional. El hotel también dispone de bar, jardín y programa de animación nocturno.
El alojamiento cuenta con parque infantil y piscina infantil con toboganes y juegos acuáticos.',
'Cádiz', 'Paseo Costa de la Luz', '55', '11550', '4', 'S', 'N', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Sevilla', 'Este hotel se encuentra a solo 5 minutos a pie del centro histórico de Sevilla y combina instalaciones modernas con el encanto andaluz tradicional.
Las modernas habitaciones tienen conexión WiFi gratuita, TV de pantalla plana vía satélite y aire acondicionado.
Los huéspedes pueden disfrutar de bebidas en el bar salón con jardín o en el bar de cócteles. También hay un bar cafetería que ofrece aperitivos.
Por las mañanas se sirve un desayuno Antiox que incluye productos saludables. La ubicación del hotel es excelente, por lo que tiene un acceso fácil.
El establecimiento está cerca de la estación del AVE (tren de alta velocidad) y a 15 minutos en coche del aeropuerto internacional de San Pablo, del edificio Expo y de todas las principales vías de acceso.', 'Sevilla', 'Calle Esclava del Señor', '2', '41013', '5', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Madrid', 'Ubicación tranquila en el barrio madrileño de Chamberí, a 200 metros de la estación de metro San Bernardo.
Sus habitaciones son modernas y cómodas e incluyen aire acondicionado y TV de plasma con canales vía satélite. Todas las habitaciones son luminosas y tienen suelo de madera.
Algunas ofrecen vistas a la avenida Alberto Aguilera. Hay WiFi gratuita. El bar salón sirve un desayuno variado en un entorno elegante. En los alrededores está la estación de metro
de San Bernardo, que a su vez se encuentra a solo 4 paradas de la puerta del Sol, en el centro de Madrid. Además, la Gran Vía está a menos de 15 minutos a pie.',
'Madrid', 'Av. de Concha Espina', '1', '28036', '5', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Gran Canaria', 'Dispone de 2 piscinas, una de ellas con agua salada, y ofrece además 2 piscinas infantiles y alojamiento con balcones grandes y vistas al mar.
El complejo tiene spa y está a solo 50 metros de las playas de Aquamarina y Patalavaca. El restaurante de la azotea ofrece espectaculares vistas al mar y elabora cocina local e internacional.
Hay además un bar junto a la piscina y un bar al aire libre en el vestíbulo, con excelentes vistas al mar. Las instalaciones incluyen gimnasio y pistas de tenis y de otros deportes.
En el spa hay sauna, baño turco, bañera de hidromasaje, servicio de masaje y diversos tratamientos de belleza.',
'Las Palmas de Gran Canaria', 'Calle León y Castillo', '330', '35007', '4', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Barcelona', 'A solo 5 minutos a pie del Parc Güell de Gaudí, ofrece habitaciones compartidas con WiFi gratuita.
El establecimiento dispone de cafetería, recepción 24 horas y cocina compartida. Las habitaciones compartidas decoradas de forma sencilla y tienen suelo de madera y literas.
Incluye acceso a un baño compartido. La ropa de cama está incluida en la tarifa, mientras que las toallas se pueden alquilar en recepción.
El establecimiento cuenta con zona de comedor y zona de salón común con sofá, TV y reproductor de DVD.',
'Barcelona', 'Carrer de Santaló', '8', '08021', '5', 'N', 'S', 'S');

/* Creación de la tabla IMAGENES_HOTELES */
CREATE TABLE IMAGENES_HOTELES (
    id            INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    img_path      VARCHAR(200) NOT NULL,
    hoteles_id    INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id) ON DELETE CASCADE
);

/* Inserción en la tabla IMAGENES_HOTELES */
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, '../../../images/hotel1.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, '../../../images/hotel2.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, '../../../images/hotel3.jpg', '3');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, '../../../images/hotel4.jpg', '4');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HOTELES`(`ID`, `IMG_PATH`, `HOTELES_ID`) VALUES (NULL, '../../../images/hotel5.jpg', '5');

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
    aire                    CHAR(1) NOT NULL,
    hoteles_id              INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id) ON DELETE CASCADE
);

/* Inserciones en la tabla HABITACIONES */

/* Habitaciones del Hotel con el ID 1 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '1', '30', '2', 'Doble', '1', 'N', 'S', 'S', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', 'S', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', 'S', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', 'S', '1');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', 'S', '1');

/* Habitaciones del Hotel con el ID 2 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '1', '30', '2', 'Doble', '1', 'N', 'S', 'S', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', 'S', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', 'S', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', 'S', '2');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', 'S', '2');

/* Habitaciones del Hotel con el ID 3 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '1', '30', '2', 'Doble', '1', 'N', 'S', 'S', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', 'S', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', 'S', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', 'S', '3');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', 'S', '3');

/* Habitaciones del Hotel con el ID 4 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '1', '30', '2', 'Doble', '1', 'N', 'S', 'S', '4');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', 'S', '4');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', 'S', '4');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', 'S', '4');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', 'S', '4');

/* Habitaciones del Hotel con el ID 5 */
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '1', '30', '2', 'Doble', '1', 'N', 'S', 'S', '5');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '2', '20', '1', 'Individual', '2', 'N', 'S', 'S', '5');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '3', '50', '4', 'Familiar', '3', 'S', 'S', 'S', '5');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '4', '40', '2', 'Doble', '2', 'N', 'S', 'S', '5');
INSERT INTO `HOTELES_ESE`.`HABITACIONES`(`ID`, `NUM_HABITACION`, `PRECIO_NOCHE`, `NUM_CAMAS`, `DESCRIPCION`, `NUM_PLANTA`, `VISTAS`, `TELEVISION`, `AIRE`, `HOTELES_ID`)
VALUES (NULL, '5', '70', '4', 'Familiar', '1', 'S', 'S', 'S', '5');

/* Creación de la tabla IMAGENES_HABITACIONES */
CREATE TABLE IMAGENES_HABITACIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    img_path          VARCHAR(200) NOT NULL,
    habitaciones_id   INTEGER NOT NULL,
    FOREIGN KEY (habitaciones_id) REFERENCES habitaciones (id) ON DELETE CASCADE
);

/* Inserción en la tabla IMAGENES_HABITACIONES */
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/img_1.jpg', '2');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion3.jpg', '3');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/hotel4.jpg', '4');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '5');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion2.jpg', '6');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion5.jpg', '7');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '8');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/img_1.jpg', '9');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '10');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion3.jpg', '11');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/img_1.jpg', '12');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/hotel2.jpg', '13');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '14');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion5.jpg', '15');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion4.jpg', '16');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/img_1.jpg', '17');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '18');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion2.jpg', '19');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion2.jpg', '20');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion5.jpg', '21');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/img_1.jpg', '22');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/hotel2.jpg', '23');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/hero_3.jpg', '24');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`)
VALUES (NULL, '../../../images/habitacion1.jpg', '25');

/* Creación de la tabla USUARIOS */
CREATE TABLE USUARIOS (
    correo      VARCHAR(100) NOT NULL PRIMARY KEY,
    nombre      VARCHAR(50) NOT NULL,
    apellidos   VARCHAR(100) NOT NULL,
    password    VARCHAR(50) NOT NULL,
    tipo        CHAR(1) NOT NULL
);

/* Inserciones en la tabla USUARIOS */
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('admin@gmail.com', 'Administrador', 'Administrador', 'YWRtaW4=', 'A');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('clara.mesa@iespoligonosur.org', 'Clara', 'Mesa Fonseca', 'ZGlzZW5pb0ludGVyZmFjZXM=', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('concepcion.guisado@iespoligonosur.org', 'Concepción', 'Guisado Jurado', 'ZGVzYXJyb2xsb1NlcnZpZG9y', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('robertofernandezromero61@gmail.com', 'Roberto', 'Fernández Romero', 'YWx1bW5vREFX', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('mercedes.florido@iespoligonosur.org', 'Mercedes', 'Florido Berrocal', 'ZGVzYXJyb2xsb0NsaWVudGU=', 'U');
INSERT INTO `HOTELES_ESE`.`USUARIOS`(`CORREO`, `NOMBRE`, `APELLIDOS`, `PASSWORD`, `TIPO`)
VALUES ('diego.fernandez@iespoligonosur.org', 'Diego Jesús', 'Fernández Raposo', 'ZGVzcGxpZWd1ZVdlYg==', 'U');

/* Creación de la tabla TIPOS_PENSIONES */
CREATE TABLE TIPOS_PENSIONES (
    id            INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion   VARCHAR(30) NOT NULL,
    precio        FLOAT NOT NULL,
    hoteles_id    INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id) ON DELETE CASCADE
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
    FOREIGN KEY (usuarios_correo) REFERENCES usuarios (correo) ON DELETE CASCADE,
    FOREIGN KEY (tipos_pensiones_id) REFERENCES tipos_pensiones (id) ON DELETE CASCADE
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

INSERT INTO `HOTELES_ESE`.`RESERVAS`(`ID`, `FECHA_RESERVA`, `FECHA_ENTRADA`, `FECHA_SALIDA`, `NUM_PERSONAS`, `USUARIOS_CORREO`, `TIPOS_PENSIONES_ID`)
VALUES (NULL, '2019-05-03 00:00:00', '2019-05-20 00:00:00', 
'2019-05-29 00:00:00', '4', 'clara.mesa@iespoligonosur.org', '13');

/* Creación de la tabla RESERVAS_HABITACIONES */
CREATE TABLE RESERVAS_HABITACIONES (
    reservas_id       INTEGER NOT NULL,
    habitaciones_id   INTEGER NOT NULL,
    FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE,
    FOREIGN KEY (habitaciones_id) REFERENCES habitaciones (id) ON DELETE CASCADE
);

/* Inserciones en la tabla RESERVAS_HABITACIONES */
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('1', '1');
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('2', '6');
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('3', '22');
INSERT INTO `HOTELES_ESE`.`RESERVAS_HABITACIONES`(`RESERVAS_ID`, `HABITACIONES_ID`)
VALUES ('4', '10');

/* Creación de la tabla VALORACIONES */
CREATE TABLE VALORACIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion       VARCHAR(100) NOT NULL,
    puntuacion        INTEGER NOT NULL,
    fecha             DATE NOT NULL,
    hoteles_id        INTEGER NOT NULL,
    usuarios_correo   VARCHAR(100) NOT NULL,
    reservas_id       INTEGER NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id) ON DELETE CASCADE,
    FOREIGN KEY (usuarios_correo) REFERENCES usuarios (correo) ON DELETE CASCADE,
    FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE
);

/* Inserciones en la tabla VALORACIONES */
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`, `RESERVAS_ID`)
VALUES (NULL, 'El mejor hotel en el que he estado', '5', '2019-05-10 00:00:00', '1', 'robertofernandezromero61@gmail.com', '1');
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`, `RESERVAS_ID`)
VALUES (NULL, 'El peor hotel en el que he estado', '1', '2019-05-23 00:00:00', '2', 'mercedes.florido@iespoligonosur.org', '2');
INSERT INTO `HOTELES_ESE`.`VALORACIONES`(`ID`, `DESCRIPCION`, `PUNTUACION`, `FECHA`, `HOTELES_ID`, `USUARIOS_CORREO`, `RESERVAS_ID`)
VALUES (NULL, 'El Wi-Fi era muy fácil de hackear', '5', '2019-05-29 00:00:00', '5', 'diego.fernandez@iespoligonosur.org', '3');

/* Creación de la tabla PETICIONES */
CREATE TABLE PETICIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre            VARCHAR(50) NOT NULL,
    apellidos         VARCHAR(50) NOT NULL,
    correo            VARCHAR(100) NOT NULL,
    telefono          VARCHAR(20),
    asunto            VARCHAR(200) NOT NULL
);