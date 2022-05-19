<?php
session_start();

$link = mysqli_connect("localhost","root","","shinshi");

//check connection

if($link ==false){
	die("ERROR! couldnt connect.". mysqli_connect_error());
}
	

 foreach ($_SESSION["shopping_cart"] as $product){
	$total=$product["quantity"]*$product["price"];
$sql1="INSERT INTO sales(code,name,quantity,total) VALUES ('$product[code]','$product[name]','$product[quantity]','$total')";




if(mysqli_query($link,$sql1)){
	echo"";
	header("location: Index.html");
} else{
echo "ERROR: Could not able to execute $sql1.";
mysqli_error($link);
 }}
unset($_SESSION["shopping_cart"]);



?>