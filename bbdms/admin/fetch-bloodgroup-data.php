<?php
include('includes/config.php');

// Fetch blood group data from the database
$sql = "SELECT BloodGroup, COUNT(*) AS Count FROM tblblooddonars GROUP BY BloodGroup";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Prepare the data in JSON format
$data = array();
foreach ($results as $row) {
    $data[] = array(
        'BloodGroup' => $row['BloodGroup'],
        'Count' => intval($row['Count'])
    );
}

// Send the data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
