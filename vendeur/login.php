<?php
include '../connection.php';

//POST = envoyer/enregistrer data mysql db
//GET = recevoir/lire data mysql db

$vendeurPassword = $_POST['vendeur_password'];
$vendeurEmail = $_POST['vendeur_email'];

$sqlQuery = "SELECT * FROM vendeur_table WHERE 
vendeur_password = '$vendeurPassword' AND vendeur_email = '$vendeurEmail'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) //le vendeur est authorisé à se connecter
{
    $vendeurRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $vendeurRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "userData"=>$vendeurRecord[0],
        )
    );
}
else //Ne pas authoriser l'utilisateur à se connecter
{
    echo json_encode(array("success"=>false));
}