<?php
include '../connection.php';

$sqlQuery = "SELECT * FROM items_table ORDER BY item_id DESC";

$resultOfQuery = $connectNow->query($sqlQuery);

if ($resultOfQuery->num_rows > 0) {
    $produitsItemsRecord = array();
    while ($rowFound = $resultOfQuery->fetch_assoc()) {
        $produitsItemsRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success" => true,  // Corrected the typo here
            "produitsItemsData" => $produitsItemsRecord,
        )
    );
} else {
    echo json_encode(array("success" => false));  // Corrected the typo here
}
?>