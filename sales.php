<?php
include('config.php');

session_start();

if(!isset($_SESSION["loggedin"]) ){
    header("location: loginAdmin.php");
exit;}

$sql = "SELECT * from sales  ";
$sql1="SELECT SUM(total) AS value_sum FROM sales";

if( isset($_GET['search']) ){
    $code = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM sales WHERE code LIKE '%$code%'";
	$sql1="SELECT SUM(total) AS value_sum FROM sales WHERE code LIKE '%$code%'";
	

}

if( isset($_GET['delete']) ){
	$inv = mysqli_real_escape_string($link, htmlspecialchars($_GET['delete']));
	$sql2="DELETE FROM sales WHERE inv='$inv';";
	$result2 = $link->query($sql2);
	
}
$result = $link->query($sql);
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
<body style="background: #84563c ;">
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
		 <br><h1>LIST OF SALES</h1>
<div style="background:#FAF0DC;" class="container" style="margin-top: 50px;">
<div>

<form action="" method="GET">
<input type="text" placeholder="search by code" name="search">&nbsp;
<input type="submit" value="search" name="searchbtn" class="searchbtn" style="background:#84563c;">
</form>


<div STYLE="background:#84563c;" class = "item-size-container">
   
   
  

<table style="background:##84563c;"class="sales" >
 
    <tr>
<th>Invoice no.</th>
<th>code</th>
<th>name</th>
<th>quantity</th>
<th>Total</th>
<th>Date</th>
<th>Edit</th>

	
</tr>
<?php
while(($row = $result->fetch_assoc())){
    ?>
    <tr>
    <td><?php echo $row['inv']; ?></td>
	<td><?php echo $row['code']; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['total']; ?></td>
	<td><?php echo $row['date']; ?></td>
	<td><form action="" method="GET">
<input type="hidden"  name="delete" value="<?php echo $row['inv'];?>">
<input type="submit" value="delete" name="deletebtn" class="deletebtn">
</form></td>
   
    </tr>
	
    <?php
}
?>
</table>
</div>
</div>
	<div  style="text-align: right;">
    <br>
      <p> <span class="price" style="color:#84563c; font-size: 20px ;"><b><?php echo "Total : RM $sum";?></b></span></p>
		<br>
		<hr>
    
  </div>
</div>
<br><br><br><br><br><br>
</body>
</html>