CREATE DATABASE IF NOT EXISTS academia_app;
USE academia_app;

CREATE TABLE IF NOT EXISTS categorias (
    idcategoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE 
);

INSERT INTO categorias (nombre) VALUES
('Matemáticas'),
('Lengua y Literatura'),
('Ciencias Sociales'),
('Ciencias Naturales');

CREATE TABLE IF NOT EXISTS cursos (
    idcurso INT AUTO_INCREMENT PRIMARY KEY,
    idcategoria INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    duracion INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (idcategoria) REFERENCES categorias(idcategoria) ON DELETE CASCADE 
);

INSERT INTO cursos (idcategoria, nombre, descripcion, duracion, precio, estado) VALUES
(1, 'Curso de Programación Web', 'Curso completo de desarrollo web con HTML, CSS y JavaScript.', 8, 150.00, 'activo'),
(2, 'Curso de Lengua y Literatura', 'Curso para mejorar la comprensión lectora y escritura en español.', 6, 80.00, 'activo'),
(3, 'Curso de Historia Universal', 'Introducción a la historia mundial, con enfoque en los eventos clave.', 12, 120.00, 'activo'),
(4, 'Curso de Ciencias Naturales', 'Estudio de la biología, química y física a nivel secundario.', 10, 100.00, 'activo');
