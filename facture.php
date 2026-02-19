<?php
include 'config.php';

if(!isset($_GET['id'])) die("Commande introuvable");
$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM livraisons WHERE id=?");
$stmt->execute([$id]);
$commande = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$commande) die("Commande introuvable");

/* Conversion du total en lettres */
$fmt = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
$total_lettres = ucfirst($fmt->format($commande['prix_total'])) . " francs CFA";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Facture VINAIGRE VITAL</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="facture">
    <h1>FACTURE – VINAIGRE VITAL</h1>

    <p><strong>Client :</strong> <?= $commande['nom'].' '.$commande['prenom'] ?></p>
    <p><strong>Téléphone :</strong> <?= $commande['telephone'] ?></p>
    <p><strong>Lieu :</strong> <?= $commande['lieu'] ?></p>
    <hr>

    <table class="table-facture">
        <tr>
            <th>Produit</th>
            <th>Quantité (L)</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
        </tr>
        <tr>
            <td><?= $commande['libelle_produit'] ?></td>
            <td><?= $commande['quantite'] ?></td>
            <td><?= number_format($commande['prix_unitaire'],0,","," ") ?> FCFA</td>
            <td><?= number_format($commande['prix_total'],0,","," ") ?> FCFA</td>
        </tr>
    </table>

    <p><strong>Mode de paiement :</strong> <?= $commande['mode_paiement'] ?></p>

    <p class="statut <?= $commande['statut']=='PAYÉE'?'paye':'non-paye' ?>">
        <?= $commande['statut'] ?>
    </p>

    <p class="total">
        Total à payer : <?= number_format($commande['prix_total'],0,","," ") ?> FCFA
    </p>

    <p class="total-lettres">
        Arrêté la présente facture à la somme de :
        <strong><?= $total_lettres ?></strong>
    </p>

    <button onclick="window.print()">🖨 Imprimer / Télécharger PDF</button>
</div>

<?php include 'pied_de_page.php'; ?>

</body>
</html>
