<?php
include '../connection.php';

//POST = envoyer/enregistrer data mysql db
//GET = recevoir/lire data mysql db

$userPassword = md5($_POST['password']);
$userEmail = $_POST['email'];

$sqlQuery = "SELECT * FROM utilisateurs_table WHERE 
password = '$userPassword' AND email = '$userEmail'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) //l'utilisateur est authorisé à se connecter
{
    $userRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $userRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "userData"=>$userRecord[0],
        )
    );
}
else //Ne pas authoriser l'utilisateur à se connecter
{
    echo json_encode(array("success"=>false));
}