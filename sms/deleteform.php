<?php
include('dbcon.php');
$id=$_REQUEST['sid'];
$query="DELETE FROM student WHERE  id = '$id'";
$run=mysqli_query($con,$query);
if($run==true)
{ ?> 
  <script> 
  alert("data deleted succesfully");
window.open('admindash.php','self');
</script>
<?php
}
?>