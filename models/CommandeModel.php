<?php
require_once 'Database.php';

class CommandeModel {
    public static function getPending() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM commandes WHERE statut = 'EN_ATTENTE'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert($nom_table, $nom_plat, $quantite, $type_plat) {
        $stmt = Database::getConnection()->prepare("INSERT INTO commandes (nom_table, nom_plat, quantite, type_plat) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nom_table, $nom_plat, $quantite, $type_plat]);
    }

    public static function updateStatus($id, $statut) {
        $stmt = Database::getConnection()->prepare("UPDATE commandes SET statut = ? WHERE id = ?");
        return $stmt->execute([$statut, $id]);
    }

    public static function getServed() {
        return Database::getConnection()->query("SELECT * FROM commandes WHERE statut = 'SERVIE'")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPopularType() {
        return Database::getConnection()->query("SELECT type_plat, SUM(quantite) as total FROM commandes GROUP BY type_plat ORDER BY total DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    }
}