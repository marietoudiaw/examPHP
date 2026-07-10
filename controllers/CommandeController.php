<?php
require_once 'models/CommandeModel.php';

class CommandeController {
    public static function calculerCA() {
        $commandes = CommandeModel::getServed();
        $total = 0;
        
        foreach ($commandes as $c) {
    
            $prixUnitaire = 0;
            switch ($c['type_plat']) {
                case 'ENTREE':
                    $prixUnitaire = 2500;
                    break;
                case 'PLAT_PRINCIPAL':
                    $prixUnitaire = 6000;
                    break;
                case 'DESSERT':
                    $prixUnitaire = 3000;
                    break;
            }
            $total += ($prixUnitaire * $c['quantite']);
        }
        return $total;
    }
}