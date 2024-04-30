CREATE DATABASE clinicsFake_db;


USE clinicsFake_db;

CREATE TABLE Clinics (
    Id_clinic INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Name NVARCHAR(200) NOT NULL,
    Status NVARCHAR(50),
    Permalink NVARCHAR(255),
    Description NVARCHAR(500),
    Address NVARCHAR(255),
    Address2 NVARCHAR(255),
    City NVARCHAR(100),
    State NVARCHAR(100),
    Zip INT,
    Country NVARCHAR(100),
    Country_iso NVARCHAR(50),
    Lat FLOAT,
    Lng FLOAT,
    Phone NVARCHAR(20) -- Cambiado a NVARCHAR
);

INSERT INTO Clinics (Name, Status, Permalink, Description, Address, Address2, City, State, Zip, Country, Country_iso, Lat, Lng, Phone)
VALUES 
('Fisioterapia Bola de Oro', 'publish', 'fisioterapia-bola-de-oro', '', 'Camino Real de los Neveros, 12', '', 'Granada', '', 18008, 'España', 'ES', 37.162118, -3.586187, '958812011'),
('Centro de Fisoterapia Kasai', 'publish', 'centro-de-fisoterapia-kasai', '', 'Baracoa, 4', '', 'Almuñecar', '', 18690, 'España', 'ES', 36.733929, -3.686522, '696343569'),
('FIOSTEC FUNCIONAL', 'publish', 'fiostec-funcional', '', 'Carretera Barcelona, 150', '', 'SABADELL', 'Cataluña', 8205, 'España', 'ES', 41.540627, 2.105554, '937127555'),
('UPLINE CLINIC', 'publish', 'upline-clinic', '', 'CARRER DEL ALTS FORNS, 57', '', 'Barcelona', '', 8038, 'España', 'ES', 41.358336, 2.139668, '615647850'),
('FISIOTERAPIA SALUS', 'publish', 'fisioterapia-salus-2', '', 'Avda. José María Tomassetti, 27M', '', 'LÉBRIJA', 'Sevilla', 41740, 'España', 'ES', 36.921378, -6.067988, '678457086'),
('EZEN Salud y Rendimiento', 'publish', 'ezen-salud-y-rendimiento-2', '', 'Manuel Deschamps, 11', '', 'A Coruña', '', 15011, 'España', 'ES', 43.36557, -8.423817, '633582566'),
('CLÍNICA VAZQUEZ PONFERRADA', 'publish', 'clinica-vazquez-ponferrada', '', 'Ortega y Gasset, 25', '', 'Ponferrada', 'León', 24400, 'España', 'ES', 42.544189, -6.597495, '987111196'),
('CLÍNICA VÁZQUEZ A CORUÑA', 'publish', 'clinica-vazquez-a-coruna', '', 'Rua Teresa Herrera, 3 Bajo', '', 'CAMBRE', 'A Coruña', 15679, 'España', 'ES', 43.318885, -8.356379, '981612104');

