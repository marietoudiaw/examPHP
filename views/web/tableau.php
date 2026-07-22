<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Interface Serveur - Restaurant</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .form-section { background: #f9f9f9; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Interface Serveur</h1>

    <div class="form-section">
        <h3>Prendre une nouvelle commande</h3>
        <form method="POST" action="index.php">
            <input type="text" name="table" placeholder="Nom Table (ex: Table 1)" required>
            <input type="text" name="plat" placeholder="Nom du Plat" required>
            <input type="number" name="quantite" placeholder="Quantité" min="1" required>
            <select name="type">
                <option value="ENTREE">Entrée</option>
                <option value="PLAT_PRINCIPAL">Plat Principal</option>
                <option value="DESSERT">Dessert</option>
            </select>
            <button type="submit" name="action" value="ajouter">Valider Commande</button>
        </form>
    </div>

    <h2>Commandes en attente</h2>
    <table>
        <tr>
            <th>ID</th><th>Table</th><th>Plat</th><th>Type</th><th>Quantité</th><th>Action</th>
        </tr>
        <?php if (empty($commandes)): ?>
            <tr><td colspan="6">Aucune commande en attente.</td></tr>
        <?php else: ?>
            <?php foreach ($commandes as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['id']) ?></td>
                <td><?= htmlspecialchars($c['nom_table']) ?></td>
                <td><?= htmlspecialchars($c['nom_plat']) ?></td>
                <td><?= htmlspecialchars($c['type_plat']) ?></td>
                <td><?= htmlspecialchars($c['quantite']) ?></td>
                <td>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="id" value="<?= $c['id'] ?>">
                        <button type="submit" name="action" value="servir" style="color: green;">Marquer comme Servi</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

    <hr>
    <h3>Statistiques du jour</h3>
    <p>Chiffre d'affaires total encaissé : <strong><?= number_format($caTotal, 0, ',', ' ') ?> FCFA</strong></p>
    <p>Plat le plus populaire: <strong><?= isset($pop['nom_plat']) ? $pop['nom_plat'] : "THIEP POISSON" ?></strong></p>
</body>
</html> 