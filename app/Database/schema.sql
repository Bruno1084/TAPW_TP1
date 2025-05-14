create schema mi_veterinaria_db;
use mi_veterinaria_db;

-- Esquema de base de datos
create table mascotas(
	nroRegistro int not null auto_increment,
	nombre varchar(100) not null,
    especie varchar(100) not null,
    raza varchar(100) not null,
    edad int not null,
    fechaAlta Date,
    fechaDefuncion Date,
    primary key (nroRegistro)
);

create table amos(
	id int not null auto_increment,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    direccion varchar(100) not null,
    telefono varchar(20) not null,
    fechaAlta Date,
    primary key (id)
);

create table veterinarios(
	id int not null auto_increment,
    nombre varchar(50) not null,
    apellido varchar (50) not null,
    especialidad varchar(100) not null,
    telefono varchar(20) not null,
    fechaIngreso Date,
    fechaEgreso Date,
    primary key (id)
);

create table amo_mascota(
	id int not null auto_increment,
    idAmo int not null,
    idMascota int not null,
    fechaInicio Date,
    fechaFinal Date,
    motivoFin enum('venta', 'fallecimiento') default null,
    primary key (id),
    foreign key (idAmo) references amos(id),
    foreign key (idMascota) references mascotas(nroRegistro)
);

CREATE TABLE veterinario_mascota (
    id int not null auto_increment,
    idVeterinario int not null,
    idMascota int not null,
    fechaAtencion Date not null,
    motivoAtencion varchar(255),
    primary key (id),
    foreign key (idVeterinario) references veterinarios(id),
    foreign key (idMascota) references mascotas(nroRegistro)
);


-- Ejemplos de prueba
INSERT INTO mascotas (nombre, especie, raza, edad, fechaAlta, fechaDefuncion)
VALUES 
('Firulais', 'Perro', 'Labrador', 5, '2023-01-15', NULL),
('Misu', 'Gato', 'Persa', 3, '2022-09-20', NULL),
('Toby', 'Perro', 'Bulldog', 7, '2020-06-12', '2024-03-01');

INSERT INTO amos (nombre, apellido, direccion, telefono, fechaAlta)
VALUES 
('Carlos', 'Pérez', 'Av. Siempre Viva 123', '2664123456', '2022-01-10'),
('Lucía', 'Gómez', 'Calle Los Pinos 456', '2664789012', '2021-11-05'),
('Marta', 'Díaz', 'Calle Rivadavia 789', '2664345678', '2023-05-22');

INSERT INTO veterinarios (nombre, apellido, especialidad, telefono, fechaIngreso, fechaEgreso)
VALUES 
('Ana', 'Suárez', 'Cirugía', '2664001122', '2020-03-15', NULL),
('Jorge', 'Ramírez', 'Clínica General', '2664098765', '2019-08-01', '2024-02-28'),
('Laura', 'Fernández', 'Dermatología', '2664012345', '2021-01-12', NULL);

INSERT INTO amo_mascota (idAmo, idMascota, fechaInicio, fechaFinal, motivoFin)
VALUES 
(1, 1, '2023-01-15', NULL, NULL), -- Carlos → Firulais
(2, 2, '2022-09-20', NULL, NULL), -- Lucía → Misu
(3, 3, '2020-06-12', '2024-03-01', 'fallecimiento'); -- Marta → Toby

INSERT INTO veterinario_mascota (idVeterinario, idMascota, fechaAtencion, motivoAtencion)
VALUES 
(1, 1, '2023-04-10', 'Cirugía de esterilización'), -- Ana atiende a Firulais
(2, 2, '2023-02-05', 'Control general'), -- Jorge atiende a Misu
(3, 3, '2023-12-10', 'Tratamiento de piel'); -- Laura atiende a Toby
