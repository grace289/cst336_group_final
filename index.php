<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    
    if(!isset($_SESSION['loginName'])){
    }
    else{
      header("Location:login.php");
   }
    

    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");
    include("header.php");
    
    include 'functions.php';

    function displaySearchResults(){
        global $conn;

        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found:</h3>";

            $namedParameters = array();

            $sql = "SELECT * FROM product";

            if(!empty($_GET['category'])){
                $sql .= " WHERE catId = :catId";
                $namedParameters[":catId"] = $_GET['category'];
            }

            echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($records as $record){
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                echo  $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
            }
        }
    }

    function displayCategories(){
        global $conn;

        $sql = "SELECT catID, catName from category ORDER BY catName";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>".$record["catName"]."</option>";
        }
    }

?>

<!-- Navbar =============================================== -->
<div class="span12">     
<h4>Latest Products </h4>
      <ul class="thumbnails">
        <?php
            $sql = "SELECT * from category right JOIN product ON category.catName=product.category";  
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
            foreach ($items as $key => $value) {
              echo('<li class="span4">
                      <div class="thumbnail">
                        <a  href="#"><img src="themes/images/products/6.jpg" alt=""/></a>
                        <div class="caption">
                          <h5>'.$value['productName'].'</h5>
                          <p> 
                            '.$value['description'].'
                          </p>
                         
                          <h4 style="text-align:center">
                            <a class="btn" href="#"> 
                                <i class="icon-zoom-in"></i></a> 
                                    <a class="btn" onclick=addtocart("'.$value['itemId'].'") >"'.$value['itemId'].'" Add to 
                                        <i class="icon-shopping-cart"></i></a>
                                         <a class="btn btn-primary" href="#">$'.$value['UnitPrice'].'
                                    </a>
                            </h4>
                        </div>
                      </div>
                    </li>');
            }
        ?>
      </ul> 
    <button style="margin-left: 42%;height: 50px;width: 150px" class="btn btn-success">Loadmore</button>
</div>


<!----====================================Call to Footer============================------>
<?php include("footer.php");?>

