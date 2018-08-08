<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    include './dbConnection.php';

    $conn = getDatabaseConnection("store");
      
?>

<!DOCTYPE html>
<html>
    <head>
        <title> CST336 Group Final </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <h1> CST336 Cell Phone ELectronics Online Store </h1>

            Navigation Bar Goes here ( Home / Login / Cart )
            <a href="login.php">( Replace Me Login )</a>

            <br />
        </div>
        TODO </br>
        Create Database
        <hr>
        <footer>
            <hr>
            Disclaimer<br />
            <strong>Disclaimer:</strong>The information on the website is used for academic purposes.<br />
            ©2018 Team Hopper

       </footer>
    </body>
</html>