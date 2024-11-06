CREATE DATABASE if NOT EXISTS veterinariDB;
USE veterinariDB;

CREATE TABLE Animal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    edad INT,
    numeroVacunes INT,
    propietario_id INT,
    FOREIGN KEY (propietario_id) REFERENCES Propietario(id) ON DELETE CASCADE
);

CREATE TABLE Propietario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    edad INT,
    telefono INT
);

CREATE TABLE Perro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    animal_id INT,
    raza VARCHAR(50) NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES Animal(id) ON DELETE CASCADE
);

CREATE TABLE Gato (
    id INT PRIMARY KEY AUTO_INCREMENT,
    animal_id INT,
    color VARCHAR(50) NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES Animal(id) ON DELETE CASCADE
);

CREATE TABLE Iguana (
    id INT PRIMARY KEY AUTO_INCREMENT,
    animal_id INT,
    longitud DECIMAL(5, 2),
    FOREIGN KEY (animal_id) REFERENCES Animal(id) ON DELETE CASCADE
);