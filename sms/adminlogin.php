<?php 
session_start();
if(isset($_SESSION['id'])){
	header('location:admindash.php');
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
     <b style="float:left" ><a href="index.php" style="font-size: 15px,margin-top: 40px">Student Display</a></b>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Admin Login</h3>
			</div>
			<div class="card-body">
				<form action="adminlogin.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name='uname'>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name='pass' class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
<?php
include('dbcon.php');
if(isset($_POST["login"])){
	$username=$_POST["uname"];
	$password=$_POST["pass"];
	$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$run=mysqli_query($con,$query);
	$row=mysqli_num_rows($run);
	if($row<1)
	{
		?>
       <script>window.open('adminlogin.php','self');
       	alert("username and password not matching"); </script>
       	<?php

	}
	else
	{
		$data=mysqli_fetch_assoc($run);
		$id=$data["id"];
		
	    $_SESSION['id']=$id;
	    header('location:admindash.php');	
	}
}


?>
