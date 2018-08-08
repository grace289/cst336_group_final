
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
?>
<?php
	if(isset($_POST['categoryid']) && isset($_POST['categorytoken'])){
	   		$sql = "SELECT * FROM `product` WHERE category ='".$_POST['categoryid']."'";  
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result ='';
       foreach ($items as $key => $value) {
	      	$result.='<li class="span3">
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
	            </li>';
		}
		echo $result;
	}
	else if(isset($_POST['keyword']) && isset($_POST['srchtoken'])){
			//SELECT * FROM `product` WHERE productName like '%a%'
	    $sql = "SELECT * FROM `product` WHERE productName like'%".$_POST['keyword']."%'";  
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result ='';
       foreach ($items as $key => $value) {
	      	$result.='<li class="span3">
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
	            </li>';
		}
		echo $result;
	}
	else if(isset($_POST['sortby']) && isset($_POST['sortoken'])){
			//SELECT * FROM `product` WHERE productName like '%a%'
		if($_POST['sortby'] == 'asc_name'){
		   $sql = "SELECT * FROM `product` order by productName ASC";  
		}
		if($_POST['sortby'] == 'desc_name'){
		   $sql = "SELECT * FROM `product` order by productName DESC";  
		}
		if($_POST['sortby'] == 'asc_price'){
		   $sql = "SELECT * FROM `product` order by UnitPrice ASC";  
		}
		if($_POST['sortby'] == 'desc_price'){
		   $sql = "SELECT * FROM `product` order by UnitPrice DESC";  
		}
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result ='';
       foreach ($items as $key => $value) {
	      	$result.='<li class="span3">
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
	            </li>';
		}
		echo $result;
	}
	else{
		echo("no way to search ......");
	}

?>