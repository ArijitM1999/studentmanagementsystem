<?php
session_start();
if($_SESSION['id']){
	echo("");
}
else
{
	header('location:adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
	.img-jmbo{
		background-image: url("http://getwallpapers.com/wallpaper/full/4/b/a/573224.jpg");
		background-size: cover;
	}
	body{
		background-image: url("http://getwallpapers.com/wallpaper/full/0/e/6/165796.jpg");
        background-size: cover; 
	}
</style>
<body >
<div class="jumbotron img-jmbo">

  <div class="container">
  	<b style="float:right"><a href="logout.php" style="font-size: 15px,margin-top: 0px">Logout</a></b>
    <h1 class="display-4" align='center'>ADMIN DASHBOARD</h1>
  </div>
</div>
<div class="container abc" style="padding-top: 100px">
<table class="table table-dark">
  <tbody align="Center">
    <tr>
      <TD><a href="insert.php">INSERT DATA</a></TD>
    </tr>
       <tr>
      <TD><a href="delete.php">DELETE DATA</a></TD>
    </tr>
    <tr>
      <TD><a href="update.php">UPDATE DATA</a></TD>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>