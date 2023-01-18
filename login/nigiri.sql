-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 11:09:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `NIGIRI`
--
CREATE DATABASE IF NOT EXISTS `NIGIRI` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `NIGIRI`;

-- --------------------------------------------------------

--
-- Estructura para la tabla UsuariosRegistrados
--


CREATE TABLE `Usuarios` (
  `IdUsuarios` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  CONSTRAINT pkU PRIMARY KEY (`IdUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Comida` (
  `IdComida` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Descripción` varchar(100) NOT NULL,
  `Ingredientes` varchar(100) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  CONSTRAINT pkC PRIMARY KEY (`IdComida`)
);

CREATE TABLE `RegistroPedidos` (
  `IdPedidos` int NOT NULL AUTO_INCREMENT,
  `IdUsuarios` int NOT NULL,
  `IdComida` int NOT NULL,
  `PrecioFinal` int NOT NULL,
  `FechaPedido` varchar(100) NOT NULL,
  CONSTRAINT pkP PRIMARY KEY (IdPedidos),
  FOREIGN KEY (IdComida) REFERENCES Comida(IdComida),
  FOREIGN KEY (IdUsuarios) REFERENCES Usuarios(IdUsuarios)
);

CREATE TABLE `Mesa` (
  `IdMesa` int NOT NULL AUTO_INCREMENT,
  `NombreMesa` varchar(100) NOT NULL,
  CONSTRAINT pkM PRIMARY KEY (`IdMesa`)
);

CREATE TABLE `RegistroReservas` (
  `IdReservas` int NOT NULL AUTO_INCREMENT,
  `IdUsuarios` int NOT NULL,
  `Mesa` int NOT NULL,
  `FechaPedido` varchar(100) NOT NULL,
  CONSTRAINT pkR PRIMARY KEY (`IdReservas`),
  FOREIGN KEY (IdUsuarios) REFERENCES Usuarios(IdUsuarios),
  FOREIGN KEY (Mesa) REFERENCES Mesa(IdMesa)
);