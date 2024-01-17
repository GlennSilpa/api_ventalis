<?php
include '../connection.php';

// POST = envoyer/enregistrer data mysql db
// GET = recevoir/lire data mysql db

$userName = $_POST['username'];
$userEntreprise = $_POST['entreprise'];
$userPassword = md5($_POST['password']);
$userPrenom = $_POST['prenom'];
$userEmail = $_POST['email'];

$sqlQuery = "INSERT INTO utilisateurs_table (username, entreprise, password, prenom, email) VALUES ('$userName', '$userEntreprise', '$userPassword', '$userPrenom', '$userEmail')";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>