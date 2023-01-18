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
  `Descripción` varchar(300) NOT NULL,
  `Ingredientes` varchar(100) NOT NULL,
  `Precio` varchar(100) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
   `tipo` varchar(100) NOT NULL,
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
  `FechaReserva` varchar(100) NOT NULL,
  `NumeroPersonas` int NOT NULL,
  CONSTRAINT pkR PRIMARY KEY (`IdReservas`),
  FOREIGN KEY (IdUsuarios) REFERENCES Usuarios(IdUsuarios),
  FOREIGN KEY (Mesa) REFERENCES Mesa(IdMesa)
);

CREATE TABLE `Administrador` (
  `IdAdmin` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  CONSTRAINT pkA PRIMARY KEY (`IdAdmin`)
);

CREATE TABLE `Trabajadores` (
  `IdTrabajador` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  CONSTRAINT pkT PRIMARY KEY (`IdTrabajador`)
);

Insert Into `Administrador` (NombreUsuario,Contraseña) VALUES ("Admin","12345");

/*Las secciones serán Entrantes, Ramen, Postres y Bebidas*/
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Gyoza","stuffed with pork and vegetables",
"· 250 gr of minced pork
· 100g cabbage
· 50g of spring onion
· 2 garlic cloves
· 1 teaspoon ginger
· 1 tablespoon of soy sauce.
· 1 teaspoon salt.
· ½ teaspoon of sugar.
· 1/2 teaspoon cornstarch.
· Sesame oil", "9,59","gyoza.jpg","Main Courses");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Edamame","Cold",
"· 500g frozen edamame
· 2 tablespoons of flake salt
· 1 teaspoon ground hot paprika","3,95","edamame.jpg","Main Courses");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Vegetable roll","Minced pork and vegetables",
"· 1 red onion, halved
· 2 garlic cloves, peeled
· 2 medium carrots, peeled
· 2 small zucchini, trimmed
· 1 tbsp vegetable oil
· 1 corn cob, kernels removed
· 3/4 cup Bulla Cottage Cheese
· 1 1/2 cups rolled oats
· 2 tsp dried mixed herbs
· 3 tsp hot chilli sauce
· 2 eggs, lightly beaten
· 3 sheets frozen ready-rolled puff pastry, partially thawed
· 1 tbsp sesame seeds","6.50","rollitos.jpg","Main courses");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Miso","vegetable soup",
"· 1 l de agua o caldo dashi
· 15 g de alga wakame deshidratada
· 3 cucharadas de miso
· 200 g de tofu
· 50 g de puerro
· 50 g de cebolleta
· Fideos soba","3,50","Miso.jpg","Main courses");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Black garlic chicken ramen","Classic, savory, and comforting. The perfect cozy companion for an evening at home. Overflowing with notes of garlic, scallions, and umami.",
"· Pumpkin Seed Protein
· Wheat Gluten
· Food Starch Modified
· Sustainable Palm Oil
· Wheat
· Contains less than 2% of the following: Yeast Extract, Soybean Powder, Black Garlic Powder, Garlic Powder, Sea Salt, Natural Flavors, Onion Powder, Coconut Milk Powder, Salt, Sesame Oil, Spices, Turmeric (For Color), Safflower Oil, Sunflower Oil, Gum Acacia, Tricalcium Phosphate, Potassium Chloride, Calcium Carbonate, Maltodextrin, Tapioca Maltodextrin","6,5","Ramen1.png","Ramens");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Paitan chicken ramen","Chicken paitan broth is the chicken-based cousin of tonkotsu ramen broth—creamy, rich, and perfect for noodle soups.",
"· 1kg chicken carcasses, cut into smaller pieces
· 500g chicken feet
· 2 shallots (Aussie)/scallions, cut into 10cm long pieces
· 1 onion cut into large pieces
· 1 bulb of garlic, halved
· 30g ginger, crushed
· 3L water
· 2 tbsp milk","7,99","Ramen2.png","Ramens");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Spicy beef ramen","Hearty, rich, and spicy. A broth that takes your tastebuds on a trip across the world. Brimming with notes of Sichuan peppercorns, anise, and fennel.",
"· Pumpkin Seed Protein
· Wheat Gluten
· Food Starch Modified
· Sustainable Palm Oil
· Wheat
· Contains less than 2% of the following: Yeast Extract, Natural Flavors, Sea Salt, Agave Inulin Powder, Garlic Powder, Spices, Onion Powder, Rice Bran Oil, Potassium Chloride, Calcium Carbonate, Maltodextrin","6,5","Ramen3.png","Ramens");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("Ice cream ball","Black Sesame Ice Cream",
"· 1 x 395g tin sweetened condensed milk
· 6 tablespoons black sesame paste (purchased from asian supermarkets)
· 1/2 cup black sesame seeds, toasted
· 2 cups thickened cream","2,90","helado.jpg","Dessert");
Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ("MOCHIS 3 units","Steamed filled dumplings made with sticky rice, called mochigome, which is particularly sweet.",
"· Rice flour 200 g
· 240ml water
· Sugar 250 g
· Salt
· Food coloring (blue, green, pink)
· White beans 250 g
· Honey 2 tablespoons
· Sugar 120 g
· Sugar glass 60 g","4,90","Mochis.jpg","Dessert");
Insert Into Comida (Nombre,Descripción,Precio,Imagen,tipo) VALUES ("SAKE FRIO","cold",
"6,50","sake.jpg","Beverages");
Insert Into Comida (Nombre,Descripción,Precio,Imagen,tipo) VALUES ("KIRIN","cold",
"3,50","kirin.jpg","Beverages");
-- Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ()
-- Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ()
-- Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ()
-- Insert Into Comida (Nombre,Descripción,Ingredientes,Precio,Imagen,tipo) VALUES ()