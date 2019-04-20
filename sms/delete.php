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
<div class="container" align="Center">
<form method="post" action="delete.php">
<table cellpadding="10">
<tr>
<td><input type="text" name="name" placeholder="enter student name" required="required"></td>      
<td><select name="branch" required="required">
      <option>Enter Branch</option>
  <option value="cse">CSE</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Electrical">Electrical</option>
  <option value="Electronics">Electronics</option>
  <option value="Civil">Civil</option>
</select></td>
<td colspan=2  align="Center"><td><input type="submit" value="Search" name="submit"></td></tr>
</tr>
</table>
  </form> 
</div>
<br>
<div class="container">
<table class="table" border="1px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Branch</th>
      <th scope="col">Roll</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
 
<?php
if(isset($_POST["submit"])){

include('dbcon.php');
$name=$_POST['name'];
$branch=$_POST['branch'];
$query="SELECT * from student where name like '%$name%' and branch like '%$branch%'";
$run=mysqli_query($con,$query);
$row=mysqli_num_rows($run);
if($row<1)
{ 
  echo("<tr><td colspan=6>Record Not Found</td></tr>");
}
else{
  $c=0;
  while($data=mysqli_fetch_assoc($run))
{
  $c++;?>
    <tr>
      <td><b style="color:red"><?php echo($c); ?></b></td>
      <td><b style="color:red"><?php echo($data['name']); ?></b></td>
      <td><img src="images/<?php echo($data['image']); ?>" style="max-width: 100px"></td>
      <td><b style="color:red"><?php echo(strtoupper($data['branch'])); ?></b></td>
      <td><b style="color:red"><?php echo($data['roll']); ?></b></td>
      <td><a href="deleteform.php?sid=<?php echo($data['id']); ?>"><b style="color:red">Delete</b></a></td>
    </tr>
<?php
}
  
}
}
?>
  </tbody>
</table>
</div>
</body>
</html>