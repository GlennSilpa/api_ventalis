<?php
include '../connection.php';

$sqlQuery = "Select * FROM items_table ORDER BY item_id DESC";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)
{
 $produitsItemsRecord = array();
 while($rowFound = $resultOfQuery->fetch_assoc())
 {
    $produitsItemRsecord[] = $rowFound;
 }

 echo json_encode(
    array(
        "succes"=>true,
        "produitsItemsData"=>$produitsItemsRecord,
    )
    );
}
else
{
    echo json_encode(array("succes"=>false));
}