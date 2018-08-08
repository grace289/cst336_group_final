<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");

    function getCategories(){
        global $conn;

        $sql = "SELECT catId, catName from category ORDER BY catName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>".$record['catName']."</option>";
        }
    }

    if(isset($_GET['submitProduct'])){
        $productName = $_GET['productName'];
        $productDescription = $_GET['catDescription'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];

        $sql = "INSERT INTO product
        ( productName, productDescription, productImage, price, catId)
        VALUES ( :productName, :productDescription, :productImage, :price, :catId)";

        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>  CST336 Cell Phone Electronics Online Store Product Add </h1>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>

        <form>
            <strong>Product Name</strong> <input = "text" class="form-control" name= "productName"><br>
            <strong>Description</strong><textarea name="description" class="form-control" cols=50 rows = 4></textarea><br>
            <strong>Price</strong><input type="text" class="form-control" name="price"><br>
            <strong>Catagory</strong>
            <select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php
                    getCategories();
                ?>
            </select><br />
            <strong>Set image URL</strong><input type="text" name="productImage" class="form-control"><br>
            <input type="submit" name="submitProduct" class="btn bnt-primary" value="Add Product">
        </form>
    </body>
</html>
