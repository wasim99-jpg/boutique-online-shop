<?php
include('config.php');
session_start();



//escape user input for security
$id= mysqli_real_escape_string($link, $_REQUEST['id']);
$street= mysqli_real_escape_string($link, $_REQUEST['street']);
$postcode= mysqli_real_escape_string($link, $_REQUEST['postcode']);
$city= mysqli_real_escape_string($link, $_REQUEST['city']);
$state= mysqli_real_escape_string($link, $_REQUEST['state']);


if(isset($_POST['id'])) {$id=$_POST['id'];}

if(isset($_POST['street'])) {$street=$_POST['street'];}

if(isset($_POST['postcode'])) {$email=$_POST['postcode'];}

if(isset($_POST['city'])) {$phone=$_POST['city'];}

if(isset($_POST['state'])) {$phone=$_POST['state'];}

$query1 = "SELECT * FROM address where userID='".$_SESSION["id"]."'";
		$result1 = $link->query($query1);
 $rowcount=mysqli_num_rows($result1);
if($rowcount==0){
	
	$sql="INSERT INTO address(userID,street,postcode,city,state) VALUES ('$id','$street','$postcode','$city','$state')";
}else{
$sql="UPDATE address
SET street = '$street', postcode= '$postcode' ,city='$city',state='$state'
WHERE userID = '$id';";


}




if(mysqli_query($link,$sql)){
	echo "edit Succesful.";
} else{
echo "ERROR: Could not able to execute $sql.";
mysqli_error($link);
}
header("location: profile.php");

mysqli_close($link);

?>
