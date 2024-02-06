<?php
include '../connection.php';

$currentOnlineUserID = $_POST["currentOnlineUserID"];

$sqlQuery = "SELECT * FROM panier_table CROSS JOIN items_table WHERE panier_table.user_id = '$currentOnlineUserID' AND panier_table.panier_id = items_tables.item_id";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) //l'utilisateur est authorisé à se connecter
{
    $panierRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $panierRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "currentUserPanierData"=>$panierRecord[0],
        )
    );
}
else //Ne pas authoriser l'utilisateur à se connecter
{
    echo json_encode(array("success"=>false));
}