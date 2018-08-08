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
session_start();         
	if(isset($_GET['item'])){
		if(isset($_SESSION['items'])){
			if(sizeof($_SESSION['items'])>=1)
			{
 		   	    array_push($_SESSION['items'], $_GET['item']);
		    }
		    else
		    {
		    	$items = array();
		    	array_push($items, $_GET['item']);
		    	$_SESSION['items'] = $items;
		    } 
	    }
	    else{
	    	$_SESSION['items'] = array();
	    	array_push($_SESSION['items'], $_GET['item']);
	    }
	}
	else{
		echo "error request method";
	}
?>