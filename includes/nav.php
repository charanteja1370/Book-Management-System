<?php 
session_start();
if (!(isset($_SESSION['auth']) && $_SESSION['auth'] == true)) {
	header("Location: admin.php");
	exit();
}

if (isset($_SESSION['admin'])) {
     $admin = $_SESSION['admin'];
}

?>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php">Ocean Books</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">
                <?php if(isset($admin)) { ?>  
                <li class="active"><a href="admin.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="users.php">Admins</a></li>
                <li><a href="viewcourier.php">Courier</a></li>
                <li><a href="borrowedbooks.php">Issued books</a></li>
                <?php } ?>
               
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>