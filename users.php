<?php
include('config.php');
session_start();

if(!isset($_SESSION["loggedin"]) ){
    header("location: loginAdmin.php");
exit;}

$sql = "SELECT * from users1  ";
$result = $link->query($sql);

$sql1="SELECT COUNT(id) AS value_sum 
FROM users1;";

$result1 = $link->query($sql1); 
$row1 =  $result1->fetch_assoc(); 
$sum = $row1['value_sum'];

?>
<html>
<head>

		<link rel = "stylesheet" href = "adminStyle.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">
</head>
<body>

<nav>
			<p><a href ="homeAdmin.php" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "homeAdmin.php"> Home </a> </li>
					<li><a href = "sales.php"> Sales info</a></li>
					<li><a href = "users.php"> Customer info </a></li>
					
				</ul>
				<ul class = "accountMenu" >
					<li> <a href="logoutAdmin.php">Logout</a>
	
					</li>
					
				</ul>
				
		</nav>
		 <br><h1>LIST OF CUSTOMERS</h1>
<div style="background:#FAF0DC;"class="container" style="margin-top: 50px;">



<div style="text-align:center" style="background:#84563c;">
   
   
  

<table class="users" style="background:#84563c;">
<tr>
<th>user id</th>
<th>username</th>
<th>full name</th>
<th>email</th>
<th>phone</th>
<th>Date created</th>

	
</tr>

<?php
while(($row = $result->fetch_assoc())){
    ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
	<td><?php echo $row['username']; ?></td>
	<td><?php echo $row['fname']; ?></td>
	<td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
	<td><?php echo $row['created_at']; ?></td>
   
    </tr>
	
    <?php
}

?>

</table><br>
</div>
<div class="col-25" style="text-align: right;">
    
      <p><span class="price" style="color:#84563c;"; font-size: 20px ;"><b><?php echo "Total Customers : $sum";?></b></span></p>
		<br>
    
  </div>
	
</div>
</body>
</html>