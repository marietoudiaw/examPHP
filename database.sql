DROP DATABASE IF EXISTS gestion_restaurant;
CREATE DATABASE gestion_restaurant;
USE gestion_restaurant;

CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_table VARCHAR(50),
    nom_plat VARCHAR(50),
    quantite INT,
    type_plat ENUM('ENTREE', 'PLAT_PRINCIPAL', 'DESSERT'),
    statut ENUM('EN_ATTENTE', 'SERVIE') DEFAULT 'EN_ATTENTE'
);