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
  <?php include('dbcon.php'); 
    $id=$_GET['sid'];
    $sql="SELECT * FROM student WHERE id='$id'";
    echo($id);
    $runq=mysqli_query($con,$sql);
 while($dat=mysqli_fetch_assoc($runq)){

   ?>
 
  <form method="post" action="updateform.php" enctype="multipart/form-data">
<table class="table table-dark">
  <tbody align="Center">
    <tr>
      <TD><b>Roll No</b></TD><td><input type="number"  name="roll" required="required" value="<?php echo($dat["roll"]); ?>"></td>
    </tr>
       <tr>
     <TD><b>Full Name</b></TD><td><input type="text"  name="name" required="required" value="<?php echo($dat["name"]); ?> "></td>
    </tr>
    <tr>
    <TD><b>Contact Number</b></TD><td><input type="number"  name="contact" required="required" value="<?php echo($dat["contact"]); ?>"></td>
    </tr>
    <tr>
    <TD><b>Email</b></TD><td><input type="email" name="email" required="required" value="<?php echo($dat["email"]); ?> "></td>
    </tr>
    <tr>
    <TD><b>Attendance(in %)</b></TD><td><input type="number" step="any" placeholder="enter attendance" name="attendance" required="required" value="<?php echo($dat["attendance"]); ?>"></td>
    </tr>
    <tr>
    <TD><b>CGPA</b></TD><td><input type="number" step="any" placeholder="enter cgpa" name="cgpa" required="required" value="<?php echo($dat["cgpa"]); ?>"></td>
    </tr>
    <tr> 
    <TD><b>Branch</b></TD><td><select required="required" name="branch" value="<?php echo($dat["branch"]) ?>;">
      <option>None</option>
  <option value="cse">CSE</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Electrical">Electrical</option>
  <option value="Electronics">Electronics</option>
  <option value="Civil">Civil</option>
</select>
        </td>
    </tr>
    <tr>
      <input type="hidden" name="sid" value="<?php echo($dat["id"]); ?>">
    <TD colspan="2"><input type="submit" name="submit" value="Update"></td>
    </tr>
  </tbody>
</table>
</form>
<?php } ?>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){

include('dbcon.php');
$id=$_POST['sid'];
$roll=$_POST['roll'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$att=$_POST['attendance'];
$cg=$_POST['cgpa'];
$branch=$_POST['branch'];
$query="UPDATE student SET roll = '$roll', name = '$name' , contact = '$contact', email = '$email', attendance = '$att', cgpa = '$cg' ,  branch = '$branch' WHERE  id = '$id'";
$run=mysqli_query($con,$query);
if($run==true)
{ ?> 
  <script> 
  alert("data updated succesfully");
window.history.back();
</script>
<?php
}
}
?>
