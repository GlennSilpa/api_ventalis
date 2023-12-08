<?php

include '../connection.php';

$userEmail = $_POST['email'];

$sqlQuery = "SELECT * FROM utilisateurs_table WHERE email='$userEmail'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)
{
    //num row lenght == 1 --- l'email est déja pris --- Erreur
    echo json_encode(array("success"=>true));
}
else
{
    //num row lenght == 0 --- l'email peut être pris
    echo json_encode(array("success"=>false));
}