<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $lieu = htmlspecialchars($_POST['lieu']);
    $libelle = htmlspecialchars($_POST['libelle']);
    $quantite = floatval($_POST['quantite']);
    $prix_total = intval($_POST['prix']);
    $mode_paiement = htmlspecialchars($_POST['mode_paiement']);

    $prix_unitaire = intval(explode('|', $libelle)[1]);
    $libelle_produit = explode('|', $libelle)[0];

    $stmt = $pdo->prepare("INSERT INTO livraisons 
        (nom, prenom, telephone, lieu, libelle_produit, quantite, prix_unitaire, prix_total, mode_paiement) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $telephone, $lieu, $libelle_produit, $quantite, $prix_unitaire, $prix_total, $mode_paiement]);

    $lastId = $pdo->lastInsertId();
    header("Location: facture.php?id=$lastId");
    exit();
}else{
    echo "Aucune donnée reçue.";
}
?>
