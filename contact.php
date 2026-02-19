<?php 
include 'header.php';
include 'config.php';
?>

<h2>Contactez-nous</h2>
<p>Remplissez le formulaire ci-dessous pour nous envoyer un message.</p>

<?php
if(isset($_POST['envoyer'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages 
            (nom, prenom, telephone, email, sujet, message)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nom, $prenom, $telephone, $email, $sujet, $message);

    if($stmt->execute()){
        echo "<p style='color:green;font-weight:bold;'>Message envoyé avec succès ✅</p>";
    } else {
        echo "<p style='color:red;'>Erreur lors de l'envoi ❌</p>";
    }
}
?>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="tel" name="telephone" placeholder="Téléphone" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="sujet" placeholder="Sujet" required>
    <textarea name="message" placeholder="Votre message" required></textarea>
    <button type="submit" name="envoyer">Envoyer</button>
</form>

<?php include 'pied_de_page.php'; ?>
