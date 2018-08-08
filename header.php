<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cell Electronics Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">	
    
    
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
    <script>
        function addtocart($itemid) {
            $.ajax({
                url: "cart.php",
                type: "GET",
                data: {
                    'item' : $itemid
                },
                success: function (response) {
                    console.log(response);
                    alert($itemid+' added to cart ! ');
                }
            });
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#categoryid").change(function(){
           $.ajax({
                url: "searching.php",
                type: "POST",
                data: {
                    'categoryid' : $("#categoryid").val(),
                    'categorytoken' : true
                },
                success: function ($response) {
                    $('.thumbnails').empty();
                    $('.thumbnails').append($response);
                    if(response ==''){
                    $('.thumbnails').append(" no record found ");
                    }
                }
            });   
        });
        $("#srchFld").keypress(function(){
           $.ajax({
                url: "searching.php",
                type: "POST",
                data: {
                    'keyword' : $("#srchFld").val(),
                    'srchtoken' : true
                },
                success: function ($response) {
                    	$('.thumbnails').empty();
                    	$('.thumbnails').append($response);
                    if(response ==''){
                    	$('.thumbnails').append(" no record found ");
                    }
                }
            });   
        });
        $("#sortby").change(function(){
           $.ajax({
                url: "searching.php",
                type: "POST",
                data: {
                    'sortby' : $("#sortby").val(),
                    'sortoken' : true
                },
                success: function ($response) {
                    	$('.thumbnails').empty();
                    	$('.thumbnails').append($response);
                    if(response ==''){
                    	$('.thumbnails').append(" no record found ");
                    }
                }
            });   
        });
    });
    </script>
  </head>
<body>
<div id="header">
<div class="container">
    
    
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><h1>Cell Electronics Store</h1></a>
		<div class="form-inline navbar-search">
			<input style="padding-left: 20%; width: 120%;height: 30px; margin-top: 5%" id="srchFld"  type="text" /> 
		</div>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="index.php">Home</a></li>
	 <li class=""><a href="viewcart.php">View Cart</a></li>
	 <li class=""><a href="advancesearch.php">Search</a></li>
	 <li class=""><a href="#">About</a></li>
	 <li class=""><a href="#">Contact</a></li>
	 <li class="">
     <a href="login.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
     </li>
      <li class="">
     <a href="logout.php" role="button" style="padding-right:0"><span class="btn btn-large btn-danger">Logout</span></a>
     </li>
    </ul>
  </div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
		<div class="row">
