<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!isset($_SESSION['userLevel']))
    {
     echo " 8. Debug message userLevel not set:";
     header("Location:login.php");
    }
    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");

    function displayAllProducts(){
        global $conn;
        $sql = "SELECT * FROM product ORDER BY productName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

?>
<?php
    include("header.php");
?>       
        <script>
            function confirmDelete(){
                return confirm("Are you sure you want to delete this product?");
            }
        </script>
       
<?php
    include("sidebar.php");
?>       
    <div class="row"> 
        <h1> CST336 Cell Phone Electronics Online Store  Product Admin </h1>

        <form action="addProduct.php">
            <input type="submit" class = 'btn btn-secondary' id = "begining" name="addproduct" value="Add Product"/>
        </form>
        <?php $records=displayAllProducts();
            echo "<table class ='table table-hover'>";
            echo "<thead>
                    <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Update</th>
                    <th scope='col'>Remove</th>
                    </tr>
                    </thead>";
            echo "<tbody>";
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>" .$record['productName']."</td>";
                echo "<td>" .$record['description']. "</td>";
                echo "<td>" .$record['UnitPrice']. "</td>";
                echo "<td><a class = 'btn btn-primary' href='updateProduct.php?itemId=".$record['itemId']."'>Update</a></td>";
                echo "<form action='deleteProduct.php' onsubmission='return confirmDelete()'>";
                echo "<input type='hidden' name='itemId' value= ". $record['itemId'].">";
                echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                echo "</form>";
            }
            echo"</tbody>";
            echo "</table>";
        ?>
        TODO </BR>
    </div>
<?php
    include("footer.php");
?>