<?php
include '../connection.php';

$user_id = $_POST['user_id'];
$produit_id = $_POST['produit_id'];
$quantite = ($_POST['quantité']);


$sqlQuery = "INSERT INTO panier_table (user_id, produit_id, quantité) VALUES ('$user_id', '$produit_id', '$quantite')";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>