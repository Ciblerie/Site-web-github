<?php
$host = "localhost";
$user = "root";
$pass = "password";
$dbname = "scores_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$sql = "SELECT valeur FROM scores ORDER BY valeur DESC";
$result = $conn->query($sql);

$scores = [];
while ($row = $result->fetch_assoc()) {
    $scores[] = $row["valeur"];
}

echo json_encode($scores);
$conn->close();
?>