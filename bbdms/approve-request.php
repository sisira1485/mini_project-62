<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Update the status of the blood request to "Approved"
        $sql = "UPDATE tblblooddonars SET Status = 'Approved' WHERE id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        // Redirect back to the request received page
        header("Location: request-received.php");
    }
}
?>
