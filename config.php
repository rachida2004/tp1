<?php
$host = "localhost";
$db = "entreprise";
$user = "root";
$pass = ""; // modifier selon ton serveur

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Erreur de connexion: " . $e->getMessage());
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "entreprise");

if ($conn->connect_error) {
    die("Erreur connexion BD");
}
?>

