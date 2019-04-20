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
    <b style="float:left"><a href="admindash.php" style="font-size: 15px,margin-top: 0px">Back to Dashboard</a></b>
    <h1 class="display-4" align='center'>ADMIN DASHBOARD</h1>
    <b style="float:right"><a href="logout.php" style="font-size: 15px,margin-top: 0px">Logout</a></b>
  </div>
</div>
<div class="container abc" style="padding-top: 10px">
  <form method="post" action="insert.php" enctype="multipart/form-data">
<table class="table table-dark">
  <tbody align="Center">
    <tr>
      <TD><b>Roll No</b></TD><td><input type="number" placeholder="enter roll" name="roll"required="required"></td>
    </tr>
       <tr>
     <TD><b>Full Name</b></TD><td><input type="text" placeholder="enter full name"  name="name" required="required"></td>
    </tr>
    <tr>
    <TD><b>Contact Number</b></TD><td><input type="number" placeholder="enter contact number" name="contact" required="required"></td>
    </tr>
    <tr>
    <TD><b>Email</b></TD><td><input type="email" placeholder="enter email" name="email" required="required"></td>
    </tr>
    <tr>
    <TD><b>Attendance(in %)</b></TD><td><input type="number" step="any" placeholder="enter attendance" name="attendance" required="required"></td>
    </tr>
    <tr>
    <TD><b>CGPA</b></TD><td><input type="number" step="any" placeholder="enter cgpa" name="cgpa" required="required"></td>
    </tr>
    <tr> 
    <TD><b>Branch</b></TD><td><select name="branch" required="required">
      <option>None</option>
  <option value="CSE">CSE</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Electrical">Electrical</option>
  <option value="Electronics">Electronics</option>
  <option value="Civil">Civil</option>
</select>
        </td>
    </tr>
     <tr>
      <Th>Image</Th>
    <td><input type="file" name="simg" required="required"></td>
    </tr>
    <tr>
    <TD colspan="2"><input type="submit" name="submit" value="submit"></td>
    </tr>
  </tbody>
</table>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){

include('dbcon.php');
$roll=$_POST['roll'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$att=$_POST['attendance'];
$cg=$_POST['cgpa'];
$branch=$_POST['branch'];
$imgname=$_FILES['simg']['name'];
$tempname=$_FILES['simg']['tmp_name'];
move_uploaded_file($tempname, "images/$imgname");
$query="INSERT INTO `student`(`roll`, `name`, `contact`, `email`, `attendance`, `cgpa`, `branch`, `image`) VALUES ('$roll','$name','$contact','$email','$att','$cg','$branch','$imgname') ";
$run=mysqli_query($con,$query);
if($run==true)
{ ?> 
  <script>alert("data inserted succesfully");
window.open('insert.php','self');
</script>
<?php
}
}
?>