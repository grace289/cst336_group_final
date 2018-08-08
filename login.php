
<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<?php
if(isset($_SESSION['loginName'])){
    header("Location:index.php");
}
?>
<?php 
 include("header.php");
?>
<div id="mainBody">
   <div class="container">
      <div class="row">
         <div class="col col-md-12">
            <ul class="breadcrumb">
               <li><a href="index.php">Home</a> <span class="divider">/</span></li>
               <li class="active">Login</li>
            </ul>
            <h3> Login</h3>
            <hr class="soft"/>
            <div style="margin-left: 25%">
               <div class="span1"> &nbsp;</div>
               <div class="span5">
                  <div class="well">
                     <h4> Cell Electronics Online Store Login </h4>
                         <?php
                           if(isset($_SESSION['incorrect']) && $_SESSION['incorrect']) {
                              echo "<p class = 'lead' id = 'error' style = 'color:red'>";
                              echo "<strong>Inocrrect Username or Password!</strong</p>";
                              $_SESSION['incorrect'] = false;
                           }
                           ?>
                     <form method="post" action="loginProcess.php">
                        <div class="control-group">
                           <br>
                           <label class="control-label" for="inputEmail1">User Name</label>
                           <div class="controls">
                              <input class="span4" name="username" style="height: 30px" type="text" id="inputEmail1" placeholder="username">
                           </div>
                        </div>
                        <div class="control-group">
                           <br>
                           <label class="control-label" for="inputPassword1">Password</label>
                           <div class="controls">
                              <input type="password"  name="password" class="span4" style="height: 30px"  id="inputPassword1" placeholder="Password">
                           </div>
                        </div>
                        <div class="control-group">
                           <div class="controls">
                              <button type="submit" class="btn btn-large btn-success">Sign in</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>



<!-- MainBody End ============================= -->


<?php
include("footer.php");
?>