
<?php
session_start();
if(isset($_SESSION['items'])){
	unset($_SESSION['items']);
}
header('Location:viewcart.php');
?>
<?php
if(!isset($_SESSION['loginName'])){
    header("Location:login.php");
}
?>