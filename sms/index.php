<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
  .img-jmbo{
    background-image: url("http://getwallpapers.com/wallpaper/full/4/b/a/573224.jpg");
    background-size: cover;
  }
  body{
    background-image: url(http://getwallpapers.com/wallpaper/full/d/f/9/90066.jpg);
        background-size: cover; 
  }
</style>
</head>
<body>
	<div class="jumbotron img-jmbo">
    <div class="container">
    <h1 class="display-7" align='center'>WELCOME TO STUDENT MANAGEMENT SYSTEM</h1>
    <b style="float:right"><a href="adminlogin.php" style="font-size: 15px,margin-top: 0px">Admin Login</a></b>
  </div>
</div>
	<div class="Container" align="center" style="margin-top: 10px">
	<form method="post" action="index.php">
		<div style="color:red;font-weight: bold;">
             Name<input type="text" name="name">
        </div>
        <div style="color:red;font-weight: bold;">
            Branch <select name="branch">
  <option value="cse">CSE</option>
  <option value="mechanical">Mechanical</option>
  <option value="electrical">Electrical</option>
  <option value="electronics">Electronics</option>
  <option value="civil">Civil</option>
</select>
        </div>
        <div style="color:red;font-weight: bold;">
        	Roll <input type="number" name="roll">
        </div>
        <input type="submit" name="submit" value="Show Info">
    </form>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  include('dbcon.php');
  $name=$_POST["name"];
  $branch=$_POST["branch"];
  $roll=$_POST["roll"];
  $query="SELECT * FROM student WHERE name='$name' AND branch='$branch' AND roll='$roll'";
  $run=mysqli_query($con,$query);
  if(mysqli_num_rows($run)>0)
  {
      $data=mysqli_fetch_assoc($run); ?>
      <div class="Container" style="margin-top: 40px">
<table border="1" style="width: 50%;" align="center">
  <tr>
    <th colspan="3">STUDENT DETAILS</th>
  </tr>
  <tr>
    <td rowspan="7"><img src="images/<?php echo($data["image"]); ?>" align="center" style="max-height:150px;max-width: 120px;margin-left: 50px"></td>
    <th>Name</th>
    <TD><?php echo($data["name"]); ?></TD>
  </tr>
  <tr>
    <th>Roll</th>
    <TD><?php echo($data["roll"]); ?></TD>
  </tr>
   <tr>
    <th>Contact</th>
    <TD><?php echo($data["contact"]); ?></TD>
  </tr>
   <tr>
    <th>E-Mail</th>
    <TD><?php echo($data["email"]); ?></TD>
  </tr>
   <tr>
    <th>Branch</th>
    <TD><?php echo($data["branch"]); ?></TD>
  </tr>
   <tr>
    <th>Attendance</th>
    <TD><?php echo($data["attendance"]); ?></TD>
  </tr>
   <tr>
    <th>CGPA</th>
    <TD><?php echo($data["cgpa"]); ?></TD>
  </tr>
</table>
</div>
    <?php   
  }
  else
  {
    ?>
    <script>alert("No Student Found");</script>
    <?php
  }
}

?>