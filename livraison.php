<?php
include 'config.php';

if(isset($_GET['id_status'], $_GET['status'])){
    $id = intval($_GET['id_status']);
    $status = $_GET['status']=='PAYÉE' ? 'PAYÉE' : 'NON PAYÉE';
    $stmt = $pdo->prepare("UPDATE livraisons SET statut=? WHERE id=?");
    $stmt->execute([$status, $id]);
    header("Location: livraisons.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM livraisons ORDER BY date_commande DESC");
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>
<h2>Administration des commandes</h2>

<table class="table-commandes">
<tr><th>ID</th><th>Client</th><th>Téléphone</th><th>Lieu</th><th>Produit</th><th>Quantité</th><th>Prix total</th><th>Mode paiement</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
<?php foreach($commandes as $c): ?>
<tr>
<td><?= $c['id'] ?></td>
<td><?= $c['nom'].' '.$c['prenom'] ?></td>
<td><?= $c['telephone'] ?></td>
<td><?= $c['lieu'] ?></td>
<td><?= $c['libelle_produit'] ?></td>
<td><?= $c['quantite'] ?></td>
<td><?= number_format($c['prix_total'],0,","," ") ?></td>
<td><?= $c['mode_paiement'] ?></td>
<td class="<?= $c['statut']=='PAYÉE'?'paye':'non-paye' ?>"><?= $c['statut'] ?></td>
<td><?= $c['date_commande'] ?></td>
<td>
<?php if($c['statut']=='NON PAYÉE'): ?>
<a href="?id_status=<?= $c['id'] ?>&status=PAYÉE">Marquer PAYÉE</a>
<?php else: ?>
<a href="?id_status=<?= $c['id'] ?>&status=NON PAYÉE">Marquer NON PAYÉE</a>
<?php endif; ?>
<br>
<a href="facture.php?id=<?= $c['id'] ?>" target="_blank">Voir Facture</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php include 'pied_de_page.php'; ?>
