<?php
function afficherListeAttente($cmd) {
    if (empty($cmd)) echo "Aucune commande en attente.\n";
    else foreach ($cmd as $c) echo "ID: {$c['id']} | Table: {$c['nom_table']} | Plat: {$c['nom_plat']}\n";
}

function afficherCA($montant) { echo "CA Total : $montant FCFA\n"; }

function afficherPopularite($data) { echo "Plat favori : " . ($data['type_plat'] ?? "Aucun") . "\n"; }