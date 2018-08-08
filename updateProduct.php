<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

	include './dbConnection.php';
	$conn = getDatabaseConnection("store2");
    global $product;
    $product = getProductInfo();

  function getCategories($catId)
    {
        global $conn;
        $sql = "SELECT catId, catName FROM category ORDER BY catName";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected": "";
            echo " value = '" .$record["catId"]."'>".$record['catName']."</option>";
        }
    }

    function getProductInfo()
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE itemId = ". $_GET['itemId'];
        echo "Get: " . $sql;
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);

        return $record;
    }

    function submitProduct()
    {
        if(isset($_GET['itemId'])){
    
            
            $sql = "UPDATE product
                    SET productName = :productName,
                        description = : productDescription,
                        image = :productImage,
                        UnitPrice = :price,
                        category = :catId,
                    WHERE itemId = :itemId";
            $np = array();
            $np[":productName"] = $_GET['productName'];
            $np[":description"] = $_GET['productDescription'];
            $np[":image"] = $_GET['productImage'];
            $np[":UnitPrice"] = $_GET['price'];
            $np[":itemId"] = $_GET['itemId'];
            $np[":category"] = $_GET['catId'];
    
            echo "Submit:. " . $sql;
            $statement = $conn->prepare($sql);
            $statement->execute($np);
            echo "Product has been updated!";
    
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Product</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <h1>Product Update </h1>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="addProduct.php">Add Product</a>
        <a href="updateProduct.php">Update Product</a>
    <form>
        <input type="hidden" name="itemId" value="<?=$product['itemId']?>"/>
        <strong>Product Name</strong> <input = "text" class="form-control" value="<?=$product['productName']?>" name= "productName"><br>
        <strong>Description</strong><textarea name="productDescription" class="form-control" cols=50 rows = 4 ><?=$product['description']?></textarea><br>
        <strong>Price</strong><input type="text" class="form-control" name="price"value="<?=$product['UnitPrice']?>"> <br>
        <strong>Catagory</strong><select name="catId" class="form-control">

            <option value="">Select One</option>
            <?php getCategories($product['catId']); ?>
        </select><br />
        <strong>Set image URL</strong><input type="text" name="productImage" class="form-control" value="<?=$product['image']?>"><br>
        <input type="submit" name="submitProduct" class="btn bnt-primary" value="Update Product">
    </form>
    </body>
</html>
