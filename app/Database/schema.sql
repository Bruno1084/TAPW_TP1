create schema mi_veterinaria_db;
use mi_veterinaria_db;

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