<?php
require_once 'models/CommandeModel.php';
require_once 'controllers/CommandeController.php';

// Si une action est reçue
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'servir') {
        CommandeModel::updateStatus($_POST['id'], 'SERVIE');
    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'ajouter') {
        // Validation RG Métier
        if ($_POST['quantite'] > 0) {
            CommandeModel::insert($_POST['table'], $_POST['plat'], $_POST['quantite'], $_POST['type']);
        }
    }
}

// On récupère tout
$commandes = CommandeModel::getPending();
$caTotal = CommandeController::calculerCA();
$pop = CommandeModel::getPopularType();

require_once 'views/web/tableau.php';