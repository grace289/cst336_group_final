
<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 ?>
<?php
if(!isset($_SESSION['loginName'])){
    header("Location:login.php");
}
?> 
<?php
    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");
    include("header.php") ;     
    include("sidebar.php");
?>
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Search</li>
        </ul>
        <hr class="soft" />
        <form class="form-horizontal span6">
            <div class="control-group">
                <label class="control-label alignL">Sort By </label>
                <select id="sortby">
                    <option value="">select</option>
                    <option value="asc_name">Product name A -Z</option>
                    <option value="desc_name">Product name Z - A</option>
                    <option value="asc_price">Price low to high</option>
                    <option value="desc_price">Price high to low</option>
                </select>
                 <select id="categoryid" style="width: 150px" class="srchTxt">
                <option>All</option>
                <?php
                    if(isset($_SESSION["categories"])){
                        foreach ($_SESSION['categories'] as $key => $cat) {
                            echo ("<option value='".$cat['catName']."'>".$cat['catName']."</option>");
                        }
                    }
                ?>
            </select>
            </div>
        </form>
        <br class="clr" />
        <div class="tab-content">
            <div class="tab-pane  active" id="blockView">
                <ul class="thumbnails">
                   <?php
                    $sql = "SELECT * from category right JOIN product ON category.catName=product.category";  
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($category);
                ?>
                <?php
                    foreach ($items as $key => $value) {
                      echo('<li class="span3">
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

                <hr class="soft" />
            </div>
        </div>
        <div class="pagination">
            <ul>
                <li><a href="#">&lsaquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">&rsaquo;</a></li>
            </ul>
        </div>
        <br class="clr" />
    </div>
    <?php
    include('footer.php')
?>