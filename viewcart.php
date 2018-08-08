
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
    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");
    include("header.php");
    include("sidebar.php");
   ?>
  
<div class="span9">
<ul class="breadcrumb">
   <li><a href="index.html">Home</a> <span class="divider">/</span></li>
   <li class="active"> SHOPPING CART</li>
</ul>
<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
<hr class="soft"/>
<table class="table table-bordered">
   <thead>
      <tr>
         <th>Product</th>
         <th>Name</th>
         <th>Description</th>
         <th>Quantity/Update</th>
         <th>Price</th>
         <th>Total</th>
      </tr>
   </thead>
   <tbody>
      <?php
         if(isset($_SESSION['items'])){
            $total = 0;
            $items =array();
            $items = $_SESSION['items'];
            $items_count = array_count_values($items);
            foreach ($items_count as $key => $item_) {  
                    $stmt = $conn->prepare("SELECT * from product where itemId = ".$key);
                    $stmt->execute();
                    $records = $stmt->fetch(PDO::FETCH_ASSOC);
 
                     $total+=$item_ * $records['UnitPrice'];
               echo ('  <tr>
                        <td> <img width="60" src="themes/images/products/6.jpg" alt=""/></td>
                        <td> '.$records['productName'].'</td>
                        <td>'.$records['description'].'</td>
                        <td>
                           <div class="input-append">
                              <input disabled style="max-width:34px" placeholder="'.$item_.'" id="appendedInputButtons" size="16" type="text">           
                           </div>
                        </td>
                        <td>$'.$records['UnitPrice'].'</td>
                        <td>$'.$item_ * $records['UnitPrice'].'</td>
                     </tr>
               ');
            }
            echo '  <tr>
                  <td colspan="6" style="text-align:right">Total Price: </td>
                  <td> $'.$total.'</td>
                </tr>
                 <tr>
                  <td colspan="6" style="text-align:right">Total Tax:   </td>
                  <td> $0.00</td>
                </tr>
             <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL ('.$total.'-0.00) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> '.$total.' </strong></td>
                </tr>
';
         }
         else{

         }
      ?>
   </tbody>
</table>
<a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
<a href="clearcart.php" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
<?php
   include("footer.php");
   ?>