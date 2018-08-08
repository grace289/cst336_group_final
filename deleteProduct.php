<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include './dbConnection.php';  
    $conn = getDatabaseConnection("store2");
    $sql = "DELETE FROM product WHERE itemId = " . $_GET['itemId'];    
    echo "Delete: " . $sql . "END_OF_LINE";
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("Location: admin.php");
?>