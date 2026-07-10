<?php
require_once 'controllers/CommandeController.php';
require_once 'views/console/affichage.php';

while (true) {
    echo "\n--- MENU CUISINE ---\n1. Liste Attente\n2. Marquer Servie\n3. CA Total\n4. Popularité\n5. Quitter\n";
    $choix = readline("Choix : ");

    switch ($choix) {
        case 1:
            afficherListeAttente(CommandeModel::getPending());
            break;
        case 2:
            $id = readline("ID à servir : ");
            CommandeModel::updateStatus($id, 'SERVIE');
            break;
        case 3:
            afficherCA(CommandeController::calculerCA());
            break;
        case 4:
            afficherPopularite(CommandeModel::getPopularType());
            break;
        case 5: exit();
    }
}