-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `auth-sys`;

-- Utilisation de la base de données
USE `auth-sys`;

-- Création de la table 'users'
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20),
    `Adresse` VARCHAR(255),
    `password` VARCHAR(255) NOT NULL,
    `compte` VARCHAR(20) NOT NULL,
    `montant` DECIMAL(10,2) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table 'historique'
CREATE TABLE IF NOT EXISTS `historique` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `compte_user` VARCHAR(20) NOT NULL,
    `emetteur` VARCHAR(255) NOT NULL,
    `destinataire` VARCHAR(255) NOT NULL,
    `money` DECIMAL(10,2) NOT NULL,
    `delivre_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
