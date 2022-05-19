<?php
include('config.php');
session_start();



//escape user input for security
$id= mysqli_real_escape_string($link, $_REQUEST['id']);
$fname= mysqli_real_escape_string($link, $_REQUEST['fname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone= mysqli_real_escape_string($link, $_REQUEST['phone']);


if(isset($_POST['id'])) {$id=$_POST['id'];}

if(isset($_POST['fname'])) {$fname=$_POST['fname'];}

if(isset($_POST['email'])) {$email=$_POST['email'];}

if(isset($_POST['phone'])) {$phone=$_POST['phone'];}

echo $id;

$sql="UPDATE users1
SET fname = '$fname', email= '$email' ,phone='$phone'
WHERE id = '$id';";





if(mysqli_query($link,$sql)){
	echo "edit Succesful.";
} else{
echo "ERROR: Could not able to execute $sql.";
mysqli_error($link);
}
header("location: profile.php");

mysqli_close($link);

?>
 