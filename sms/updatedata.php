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
$imgname=$_FILES['simg']['name'];
$tempname=$_FILES['simg']['tmp_name'];
move_uploaded_file($tempname, "images/$imgname");
$query="UPDATE student SET roll = '$roll', name = '$name' , contact = '$contact', email = '$email', attendance = '$att', cgpa = '$cg' ,  branch = '$branch', image  = '$imgname' WHERE  id = '$id'";
$run=mysqli_query($con,$query);
if($run==true)
{ ?> 
  <script> 
  alert("data updated succesfully");
window.open('admindash.php','self');
</script>
<?php
}
}
?>