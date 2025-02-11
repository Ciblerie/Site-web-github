<?php
$host = "localhost";
$user = "root";
$pass = "password";
$dbname = "scores_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['score'])) {
    $score = intval($_POST['score']);
    $sql = "INSERT INTO scores (valeur) VALUES ($score)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Score ajouté avec succès";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

$conn->close();
?>