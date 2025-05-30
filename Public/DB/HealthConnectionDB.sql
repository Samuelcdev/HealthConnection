-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2025 a las 15:12:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `healthconnectiondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `appointmentId` int(11) NOT NULL,
  `appointmentUserDocument` bigint(11) NOT NULL,
  `appointmentDoctorDocument` int(11) NOT NULL,
  `appointmentAppointmentType` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentStatus` enum('Pending','Confirmed','Canceled','Finished') NOT NULL,
  `appointmentObservation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointmenttype`
--

CREATE TABLE `appointmenttype` (
  `appointmentTypeId` int(11) NOT NULL,
  `appointmentTypeName` varchar(100) NOT NULL,
  `appointmentTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `appointmenttype`
--

INSERT INTO `appointmenttype` (`appointmentTypeId`, `appointmentTypeName`, `appointmentTypeDescription`) VALUES
(1, 'Medicina General', 'Atención básica de salud, diagnóstico inicial y orientación hacia especialistas.'),
(2, 'Pediatría', 'Trata enfermedades y control del desarrollo físico y emocional de los niños.'),
(3, 'Ginecología y Obstetricia', 'Atención a la salud reproductiva de la mujer, embarazos y partos.'),
(4, 'Medicina Interna', 'Diagnóstico y tratamiento de enfermedades en adultos, como diabetes o hipertensión.'),
(5, 'Cardiología', 'Especializada en el corazón y el sistema circulatorio.'),
(6, 'Dermatología', 'Diagnóstico y tratamiento de enfermedades de la piel, uñas y cabello.'),
(7, 'Ortopedia y Traumatología', 'Trastornos de huesos, articulaciones, músculos y lesiones físicas.'),
(8, 'Oftalmología', 'Diagnóstico y tratamiento de enfermedades de los ojos y la visión.'),
(9, 'Neurología', 'Diagnóstico y tratamiento de trastornos del sistema nervioso (cerebro, médula, nervios).'),
(10, 'Psiquiatría', 'Atención de trastornos mentales y emocionales, como ansiedad, depresión o esquizofrenia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `doctorDocument` int(11) NOT NULL,
  `doctorName` varchar(100) NOT NULL,
  `doctorLastname` varchar(100) NOT NULL,
  `doctorPhone` varchar(20) DEFAULT NULL,
  `doctorEmail` varchar(100) DEFAULT NULL,
  `doctorAddress` varchar(255) NOT NULL,
  `doctorDocumentType` int(11) NOT NULL,
  `doctorEspecialityType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documenttype`
--

CREATE TABLE `documenttype` (
  `documentTypeId` int(11) NOT NULL,
  `documentTypeName` varchar(100) NOT NULL,
  `documentTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documenttype`
--

INSERT INTO `documenttype` (`documentTypeId`, `documentTypeName`, `documentTypeDescription`) VALUES
(1, 'Cedula de Cuidadanía', 'Documento para identificar personas mayores de 18 años y que sean nacidas en Colombia'),
(2, 'Cedula de Extranjería', 'Documento para identificar personas mayores de 18 años y que sean nacidas en otro país'),
(3, 'Tarjeta de Identidad', 'Documento para identificar personas menores de 18 años y que sean nacidas en Colombia'),
(4, 'Pasaporte', 'Documento para identificar personas con transito legal en Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialitytype`
--

CREATE TABLE `especialitytype` (
  `especialityTypeId` int(11) NOT NULL,
  `especialityTypeName` varchar(100) NOT NULL,
  `especialityTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialitytype`
--

INSERT INTO `especialitytype` (`especialityTypeId`, `especialityTypeName`, `especialityTypeDescription`) VALUES
(1, 'Medicina General', 'Atención básica de salud, diagnóstico inicial y orientación hacia especialistas.'),
(2, 'Pediatría', 'Trata enfermedades y control del desarrollo físico y emocional de los niños.'),
(3, 'Ginecología y Obstetricia', 'Atención a la salud reproductiva de la mujer, embarazos y partos.'),
(4, 'Medicina Interna', 'Diagnóstico y tratamiento de enfermedades en adultos, como diabetes o hipertensión.'),
(5, 'Cardiología', 'Especializada en el corazón y el sistema circulatorio.'),
(6, 'Dermatología', 'Diagnóstico y tratamiento de enfermedades de la piel, uñas y cabello.'),
(7, 'Ortopedia y Traumatología', 'Trastornos de huesos, articulaciones, músculos y lesiones físicas.'),
(8, 'Oftalmología', 'Diagnóstico y tratamiento de enfermedades de los ojos y la visión.'),
(9, 'Neurología', 'Diagnóstico y tratamiento de trastornos del sistema nervioso (cerebro, médula, nervios).'),
(10, 'Psiquiatría', 'Atención de trastornos mentales y emocionales, como ansiedad, depresión o esquizofrenia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examination`
--

CREATE TABLE `examination` (
  `examinationId` int(11) NOT NULL,
  `examinationExaminationType` int(11) NOT NULL,
  `examinationDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examinationtype`
--

CREATE TABLE `examinationtype` (
  `examinationTypeId` int(11) NOT NULL,
  `examinationTypeName` varchar(100) NOT NULL,
  `examinationTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `examinationtype`
--

INSERT INTO `examinationtype` (`examinationTypeId`, `examinationTypeName`, `examinationTypeDescription`) VALUES
(1, 'Examen de Sangre', 'Evalúa componentes como glóbulos rojos, blancos, hemoglobina, colesterol, glucosa, entre otros.'),
(2, 'Examen de Orina', 'Detecta infecciones urinarias, enfermedades renales o deshidratación.'),
(3, 'Electrocardiograma (ECG)', 'Mide la actividad eléctrica del corazón para diagnosticar arritmias, infartos u otras condiciones cardíacas.'),
(4, 'Radiografía (Rayos X)', 'Imagen interna del cuerpo, usada para examinar huesos, pulmones y órganos.'),
(5, 'Ecografía (Ultrasonido)', 'Utiliza ondas sonoras para ver órganos internos, muy común en embarazo y diagnósticos abdominales.'),
(6, 'Resonancia Magnética (RM)', 'Genera imágenes detalladas de órganos y tejidos blandos usando imanes y ondas de radio.'),
(7, 'Prueba de Esfuerzo', 'Evalúa el comportamiento del corazón durante el ejercicio físico.'),
(8, 'Endoscopia', 'Permite visualizar el interior del sistema digestivo superior usando una cámara.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `healthplan`
--

CREATE TABLE `healthplan` (
  `healthPlanId` int(11) NOT NULL,
  `healthPlanName` varchar(100) NOT NULL,
  `healthPlanDescription` varchar(255) DEFAULT NULL,
  `healthPlanPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `healthplan`
--

INSERT INTO `healthplan` (`healthPlanId`, `healthPlanName`, `healthPlanDescription`, `healthPlanPrice`) VALUES
(1, 'Plan Gratuito', '', 0),
(2, 'Plan Personal', 'Adquiere un 20% de descuento en cada consulta y examen y recibe una consulta gratis cada 3 meses', 105000),
(3, 'Plan Personal Plus', 'Adquiere un 50% de descuento en cada consulta y examen y recibe 3 consultas gratis cada 3 meses', 175000),
(4, 'Plan Familiar', 'Adquiere un 70% de descuento en cada consultar y examen y recibe 5 consultas gratis cada 3 meses', 200000),
(5, 'Plan Familiar Plus', 'Adquiere un 100% de descuento en cada consulta y examen', 275000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `historialId` int(11) NOT NULL,
  `historialDescription` varchar(255) DEFAULT NULL,
  `historialUserDocument` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`historialId`, `historialDescription`, `historialUserDocument`) VALUES
(1, 'Paciente se encuentra bien de salud, se le recomienda comer más y hacer entrenamiento de fuerza', 1013113784),
(2, 'Paciente presenta fuerte dolor en las manos, se le recitan medicamentos para tratamiento y se le solicita que agende una cita para rayos X', 80140270),
(3, 'Paciente se encuentra con un TIC en el parpado superior del ojo se le recomienda tratar de no estar en situaciones de estres', 52539631);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `paymentDescription` varchar(255) NOT NULL,
  `paymentPrice` float NOT NULL,
  `paymentTransactionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` enum('Admin','Doctor','Patient','Secretary') NOT NULL,
  `roleDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`roleId`, `roleName`, `roleDescription`) VALUES
(1, 'Patient', 'Usuario que accede como paciente'),
(2, 'Doctor', 'Profesional de salud que atiende a los pacientes'),
(3, 'Admin', 'Administrador del sistema con permisos totales'),
(4, 'Secretary', 'Personal encargado de agendamiento y atención administrativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userDocument` bigint(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userLastname` varchar(100) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userBloodType` enum('O-','O+','A-','A+','B-','B+','AB-','AB+') NOT NULL,
  `userBirthdate` date NOT NULL,
  `userSex` enum('M','F','O') DEFAULT NULL,
  `userDocumentType` int(11) NOT NULL,
  `userPlan` int(11) NOT NULL,
  `userRoleId` int(11) DEFAULT 1,
  `userStatus` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userDocument`, `userName`, `userLastname`, `userPhone`, `userAddress`, `userEmail`, `userPassword`, `userBloodType`, `userBirthdate`, `userSex`, `userDocumentType`, `userPlan`, `userRoleId`, `userStatus`) VALUES
(52539631, 'Mercy', 'Chaparro Rojas', '3118666584', 'Calle 68f sur # 71g 19', 'samiuseche@yahoo.es', '123456', 'O-', '1979-11-18', 'F', 1, 4, 3, 'Active'),
(80140270, 'Camilo Esteban', 'Useche', '3226621803', 'Calle 68f sur # 71g 19', 'camiloescreen@gmail.com', '123456', 'O+', '1983-01-02', 'M', 1, 3, 2, 'Active'),
(1013113784, 'Samuel', 'Useche', '3107838443', 'Calle 68f sur # 71g 19', 'samuuseche01@gmail.com', '123456', 'O-', '2007-01-13', 'M', 1, 2, 1, 'Active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userhealthplan`
--

CREATE TABLE `userhealthplan` (
  `userDocument` bigint(11) NOT NULL,
  `healthPlanId` int(11) NOT NULL,
  `asignedAt` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `userhealthplan`
--

INSERT INTO `userhealthplan` (`userDocument`, `healthPlanId`, `asignedAt`, `isActive`) VALUES
(1013113784, 2, '2025-04-24', 0),
(80140270, 3, '2025-04-24', 0),
(52539631, 4, '2025-04-24', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `appointmentUserDocument` (`appointmentUserDocument`),
  ADD KEY `appointmentDoctorDocument` (`appointmentDoctorDocument`),
  ADD KEY `appointmentAppointmentType` (`appointmentAppointmentType`);

--
-- Indices de la tabla `appointmenttype`
--
ALTER TABLE `appointmenttype`
  ADD PRIMARY KEY (`appointmentTypeId`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorDocument`),
  ADD KEY `doctorDocumentType` (`doctorDocumentType`),
  ADD KEY `doctorEspecialityType` (`doctorEspecialityType`);

--
-- Indices de la tabla `documenttype`
--
ALTER TABLE `documenttype`
  ADD PRIMARY KEY (`documentTypeId`);

--
-- Indices de la tabla `especialitytype`
--
ALTER TABLE `especialitytype`
  ADD PRIMARY KEY (`especialityTypeId`);

--
-- Indices de la tabla `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`examinationId`),
  ADD KEY `examinationExaminationType` (`examinationExaminationType`);

--
-- Indices de la tabla `examinationtype`
--
ALTER TABLE `examinationtype`
  ADD PRIMARY KEY (`examinationTypeId`);

--
-- Indices de la tabla `healthplan`
--
ALTER TABLE `healthplan`
  ADD PRIMARY KEY (`healthPlanId`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`historialId`),
  ADD KEY `historialUserDocument` (`historialUserDocument`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userDocument`),
  ADD KEY `userRoleId` (`userRoleId`),
  ADD KEY `userDocumentType` (`userDocumentType`),
  ADD KEY `userPlan` (`userPlan`);

--
-- Indices de la tabla `userhealthplan`
--
ALTER TABLE `userhealthplan`
  ADD KEY `userDocument` (`userDocument`),
  ADD KEY `healthPlanId` (`healthPlanId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `appointmenttype`
--
ALTER TABLE `appointmenttype`
  MODIFY `appointmentTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `documenttype`
--
ALTER TABLE `documenttype`
  MODIFY `documentTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especialitytype`
--
ALTER TABLE `especialitytype`
  MODIFY `especialityTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `examination`
--
ALTER TABLE `examination`
  MODIFY `examinationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examinationtype`
--
ALTER TABLE `examinationtype`
  MODIFY `examinationTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `healthplan`
--
ALTER TABLE `healthplan`
  MODIFY `healthPlanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `historialId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointmentAppointmentType` FOREIGN KEY (`appointmentAppointmentType`) REFERENCES `appointmenttype` (`appointmentTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointmentDoctorDocument` FOREIGN KEY (`appointmentDoctorDocument`) REFERENCES `doctor` (`doctorDocument`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointmentUserDocument` FOREIGN KEY (`appointmentUserDocument`) REFERENCES `user` (`userDocument`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctorDocumentType` FOREIGN KEY (`doctorDocumentType`) REFERENCES `documenttype` (`documentTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorEspecialityType` FOREIGN KEY (`doctorEspecialityType`) REFERENCES `especialitytype` (`especialityTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examinationExaminationType` FOREIGN KEY (`examinationExaminationType`) REFERENCES `examinationtype` (`examinationTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historialUserDocument` FOREIGN KEY (`historialUserDocument`) REFERENCES `user` (`userDocument`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `userDocumentType` FOREIGN KEY (`userDocumentType`) REFERENCES `documenttype` (`documentTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userPlan` FOREIGN KEY (`userPlan`) REFERENCES `healthplan` (`healthPlanId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userRoleId` FOREIGN KEY (`userRoleId`) REFERENCES `role` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `userhealthplan`
--
ALTER TABLE `userhealthplan`
  ADD CONSTRAINT `healthPlanId` FOREIGN KEY (`healthPlanId`) REFERENCES `healthplan` (`healthPlanId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userDocument` FOREIGN KEY (`userDocument`) REFERENCES `user` (`userDocument`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
