<?php 
   require 'includes/snippet.php';
   require 'includes/db-inc.php';
   include "includes/header.php"; 
   
   if(isset($_POST['submit'])) {
   
       $courierssn = sanitize(trim($_POST['courierssn']));
       $phoneNumber = sanitize(trim($_POST['phoneNumber']));
       $username = sanitize(trim($_POST['username']));
       $password = sanitize(trim($_POST['password']));
   
   
         $sql = "INSERT INTO courier( courierssn, phoneNumber, username, password) VALUES ('$courierssn',  '$phoneNumber','$username','$password') ";
   
         $query = mysqli_query($conn, $sql);
         $error = false;
         if($query){
          $error = true;
         }
         else{
           echo "<script>alert('Registration failed!! Try again.');
                       </script>";
         }
        
   
   }
   
   ?>
<div class="container">
   <?php include "includes/nav.php"; ?>
   <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
      <div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-10">
         <?php if(isset($error) && $error === true) { ?>
         <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Record added Successfully!</strong>
         </div>
         <?php } ?>
         <p class="page-header" style="text-align: center"><b>ADD COURIER</b></p>
         <div class="container">
            <form class="form-horizontal" role="form" action="addcourier.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">COURIER SSN</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="courierssn" placeholder="COURIERSSN" id="courierssn" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="phoneNumber" placeholder="phone number" id="phoneNumber" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">USERNAME</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="username" placeholder="USERNAME" id="username" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">PASSWORD</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="password" placeholder="Password" id="password" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                     ADD MEMBER
                     </button>                            
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>