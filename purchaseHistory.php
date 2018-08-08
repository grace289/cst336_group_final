<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    include './dbConnection.php';

    $conn = getDatabaseConnection("store2");
   
    $productId = $_GET['productId'];
    $sql = "SELECT * FROM om_product NATURAL JOIN cellstore_purchase WHERE productID = :pId";
    
    $np = array();
    $np[":pId"] = $productId;
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo $records[0]['productName'] . "<br/>";
    echo "<img src='" . $records[0]['productImage'] . "' width='200'/><br/>";
    foreach($records as $record){
        echo "Purchase Date:". $record["purchaseDate"]."<br/>";
        echo "Unit Price:". $record["unitPrice"]."<br/>";
        echo "Quantity:". $record["quantity"]."<br/>";
    }

?>
