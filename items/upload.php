<?php
include '../connection.php';

$itemLibelle = $_POST['libelle'];
$itemDescription = $_POST['description'];
$itemPrix = $_POST['prix'];
$itemCategorie = $_POST['categorie'];
$itemImage = $_POST['image'];

$sqlQuery = "INSERT INTO items_table SET libelle='$itemLibelle', description='$itemDescription', prix='$itemPrix', categorie='$itemCategorie', image='$itemImage' ";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>