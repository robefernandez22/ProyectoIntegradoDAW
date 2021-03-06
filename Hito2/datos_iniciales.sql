/* Creación de la base de datos */
DROP DATABASE IF EXISTS hoteles_ese;
CREATE DATABASE hoteles_ese;
use hoteles_ese;

/* Creación de las tablas */

/* Creación de la tabla HOTELES */
CREATE TABLE HOTELES (
    id                   INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre               VARCHAR(50) NOT NULL,
    descripcion          VARCHAR(100),
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
VALUES (NULL, 'Hoteles ESE Cádiz', 'Hotel en primera línea de playa', 'Cádiz', 'Paseo Costa de la Luz', '55', '11550', '3', 'S', 'N', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Sevilla', 'Hotel en el mejor barrio de Sevilla', 'Sevilla', 'Calle Esclava del Señor', '2', '41013', '5', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Madrid', 'Hotel a 200 metros del Santiago Bernabéu', 'Madrid', 'Av. de Concha Espina', '1', '28036', '5', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Gran Canaria', 'Hotel en Gran Canaria con piscina', 'Las Palmas de Gran Canaria', 'Calle León y Castillo', '330', '35007', '4', 'S', 'S', 'S');

INSERT INTO `HOTELES_ESE`.`HOTELES` (`ID`, `NOMBRE`, `DESCRIPCION`, `CIUDAD`, `CALLE`, `NUMERO`, `COD_POSTAL`, `ESTRELLAS`, `GARAJE`, `PISCINA`, `WIFI`)
VALUES (NULL, 'Hoteles ESE Barcelona', 'Hotel en el centro de Barcelona', 'Barcelona', 'Carrer de Santaló', '8', '08021', '5', 'N', 'S', 'S');

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
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, '../../../images/habitacion1.jpg', '1');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, '../../../images/habitacion2.jpg', '6');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, '../../../images/habitacion3.jpg', '11');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, '../../../images/habitacion4.jpg', '16');
INSERT INTO `HOTELES_ESE`.`IMAGENES_HABITACIONES`(`ID`, `IMG_PATH`, `HABITACIONES_ID`) VALUES (NULL, '../../../images/habitacion5.jpg', '21');

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
VALUES ('admin@gmail.com', 'Administrador', 'Administrador', 'YWRtaW4=', 'A');

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

/* Creación de la tabla RESERVAS_HABITACIONES */
CREATE TABLE RESERVAS_HABITACIONES (
    reservas_id       INTEGER NOT NULL,
    habitaciones_id   INTEGER NOT NULL,
    FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE,
    FOREIGN KEY (habitaciones_id) REFERENCES habitaciones (id) ON DELETE CASCADE
);

/* Creación de la tabla VALORACIONES */
CREATE TABLE VALORACIONES (
    id                INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion       VARCHAR(100) NOT NULL,
    puntuacion        INTEGER NOT NULL,
    fecha             DATE NOT NULL,
    hoteles_id        INTEGER NOT NULL,
    usuarios_correo   VARCHAR(100) NOT NULL,
    FOREIGN KEY (hoteles_id) REFERENCES hoteles (id) ON DELETE CASCADE,
    FOREIGN KEY (usuarios_correo) REFERENCES usuarios (correo) ON DELETE CASCADE
);