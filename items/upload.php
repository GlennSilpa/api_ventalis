<?php
include '../connection.php';

$itemLibelle = $_POST['libelle'];
$itemDescription = $_POST['description'];
$itemPrix = $_POST['prix'];
$itemCategorie = $_POST['categorie'];

// Check if a file was uploaded
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    if (move_uploaded_file($file_temp, "C:/xampp/htdocs/api_ventalis/upload-images/" . $file_name)) {

        $sqlQuery = "INSERT INTO items_table (`libelle`, `description`, `prix`, `categorie`,`image`)
        VALUES ('$itemLibelle', '$itemDescription', $itemPrix, '$itemCategorie','$file_name')";
        $resultOfQuery = $connectNow->query($sqlQuery);
        if ($resultOfQuery) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else {
        echo json_encode(array("success" => false, "error" => "Failed to move uploaded file."));
    }
} else {
    echo json_encode(array("success" => false, "error" => "No file uploaded or upload error occurred."));
}
