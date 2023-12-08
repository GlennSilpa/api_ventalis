<?php
include '../connection.php';

// POST = envoyer/enregistrer data mysql db
// GET = recevoir/lire data mysql db

$userName = $_POST['username'];
$userPrenom = $_POST['prenom'];
$userPassword = md5($_POST['password']);
$userEntreprise = $_POST['entreprise'];
$userEmail = $_POST['email'];

$sqlQuery = "INSERT INTO utilisateurs_table (username, prenom, password, entreprise, email) VALUES ('$userName', '$userPrenom', '$userPassword', '$userEntreprise', '$userEmail')";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>