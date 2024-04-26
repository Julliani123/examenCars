create table if not exists drones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (255) NOT NULL,
    fabricante VARCHAR (255) NOT NULL,
    modelo VARCHAR (100) NOT NULL,
    tipo VARCHAR (100) NOT NULL,
    precio DECIMAL (10, 2) NOT NULL
);

--
-- id: Identificador único del dron, configurado como un campo autonumérico.
-- nombre: Nombre del dron.
-- fabricante: Fabricante del dron.
-- modelo: Modelo del dron.
-- tipo: Tipo de dron (por ejemplo, quadcopter, hexacopter, etc.).
-- precio: Precio del dron, representado como un número decimal con un total de 10 dígitos y 2 decimales.