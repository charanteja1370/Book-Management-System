<?php
   session_start(); 
   
   if ((isset($_SESSION['c']) && $_SESSION['c'] === true)) {
   	header("Location: all_records.php");
   	exit();
   }
   
   	if (isset($_GET['access'])) {
   		$alert_user = true;
   	}
   
   require 'includes/snippet.php';
   require 'includes/db-inc.php';
   include "includes/header.php";
   
   
   
   echo"<br>";
   
   if(isset($_POST['submit'])){
   	$courierssn = sanitize(trim($_POST['courierssn']));
   	$password = sanitize(trim($_POST['password']));
   
   	$sql_courier = "SELECT * from courier where courierssn = '$courierssn' and  password = '$password' ";
   	$query = mysqli_query($conn, $sql_courier);
   	// echo mysqli_error($conn);
   	if(mysqli_num_rows($query) > 0)
   	{
   			
   				while($row = mysqli_fetch_assoc($query)){
   					$_SESSION['c'] = true;
   					$_SESSION['courier'] = $row['courierssn'];		
   					}
   					if ($_SESSION['c'] === true) {
   				header("Location: all_records.php");
   				exit();
   					}
   	}
   		
   			else {
   						echo"<div class='alert alert-success alert-dismissable'>
   						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
   						<strong style='text-align: center'> Wrong Username and Password.</strong>  </div>";
   					}		
   					
   						
   
   		
   			}
   					
   ?>
<div class="container">
   <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
      <div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
         <p class="page-header" style="text-align: center">COURIER LOGIN</p>
         <div class="container">
            <form class="form-horizontal" role="form" method="post" action="deliveryBoy.php" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="courierssn" class="col-sm-2 control-label">CourierSSN</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="courierssn" placeholder="CourierSSN" id="courierssn" required>
                  </div>
               </div>
               <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control" name="password" placeholder="Enter Password(courier)" id="password" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" class="btn btn-info col-lg-4" name="submit" value="Sign In">
                     
                  </div>
         </div>
         
         </div>
         </form>
      </div>
   </div>
</div>
</div>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"> </script> 

<?php if (isset($alert_user)) { ?>
<!-- <script type="text/javascript">
   swal("Oops...", "You are not allowed to view this page directly...!", "error");
</script> --> 
<?php } ?>
</body>
</html>