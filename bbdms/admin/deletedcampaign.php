<?php
include('includes/config.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $qry = "DELETE FROM campaign WHERE id = :id";
    $stmt = $dbh->prepare($qry);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    
    if($result){
        echo "Campaign Deleted";
       // header('Location: editcampaign.php');
        exit();
    } else {
        echo "ERROR!!";
    }
}
?>
