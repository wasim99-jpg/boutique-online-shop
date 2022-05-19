<?php

session_start();
include('config.php');
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}

      
        if(isset($_POST['checkout'])) { 
            echo "checkout"; 
        } 
      
    
	

	
?>
<html>
<head>
<style>
/*========================================================================= button*/
.remove {font-size: 10px;
background-color: #FAFDF3;
margin-top:5px;
border-radius: 4px;
border: none;
outline:none;
}
.remove:hover 
{
	color: blue;
}

.checkout{
	
	background-color: #555555;
	 border: none;
  color: white;
  padding: 10px 30px;

  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  font-family: 'Raleway', sans-serif;
}


/*========================================================================= table*/
table {
  border-collapse: collapse;
}

tr { 
  border: solid;
  border-width: 1px 0;
}
tr:first-child {
  border-top: none;
}
tr:last-child {
  border-bottom: none;
}

th, td {
  padding: 20px;
}
*
{
	
	padding: 0 ;
	margin: 0 ;
}

body
{
	background: #FAFDF3;
}
.fade-container { 
    animation: fadeIn 1s  ;
} 

@keyframes fadeIn
{
	from
	{
		opacity: 0;
		transform: translateY(-8px) ;
	}
	
	to
	{
		opacity: 1 ;
		transform: translateY(0) ;
		
	}
	
}
/*========================================================================= navigation*/

nav 
{
	opacity: .9 ;
	top: 0 ;
	background: #3f2e19 ;
	display: flex ;
	justify-content: space-around ;
	align-items: center ;
	position: sticky ;
	height: 60px;
	font-family: 'Mina', sans-serif;
	z-index: 2 ;
	
}

.shinshi
{
	transition: color .2s ;
	
}

.shinshi:hover 
{
	color: yellow ;
}


nav a
{
	font-family: 'Big Shoulders Text', cursive;
	font-size: 36px ;
	background: #3f2e19 ;
	color: white ;
	text-decoration: none ;
	
}

.menu a
{
	color: white ;
	text-decoration: none ;
	font-size: 20px ;
	transition: color .2s ;
}

.menu a:hover 
{
	color: yellow ;
}


ul.accountMenu
{
	position: sticky ;
	color: white ;
	text-decoration: none ;
	font-size: 20px ;
	right: 30px;
}

.accountMenu img 
{
	width: 35px ;
	height: 35px ;
}

.menu li , .accountMenu li
{
	display: inline-block ;
	margin-left: 20px ;
	padding: 20px ;

}
h1{
	font-family: 'Raleway', sans-serif;
		font-size: 50px ;
		font-weight: 500 ;
}
h3{
	font-family: 'Raleway', sans-serif;
		font-size: 30px ;
		font-weight: 500 ;
		text-align:center;
}

img{  display: block;
  margin-left: auto;
  margin-right: auto;
  }
  
  .quantity{
	 display: block;
margin: 0 auto;
padding: 8px 16px;
font-size:18px;
  }
 .total  {
	 text-align:right;
 }
 a.shop,a.continue{
	 font-family: 'Raleway', sans-serif;
	font-weight:bold;
	 font-size:15px;
	
 }
a.shop:link ,a.continue:link{color:black;text-decoration:none;}
a.shop:visited ,a.continue:visited {color:black;text-decoration:none;}
a.shop:hover ,a.continue:hover{color:brown;text-decoration:underline;}
</style>
<link rel = "stylesheet" href = "style1.css ?v=<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text&family=Josefin+Sans:wght@500&family=Medula+One&family=Mina&family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">


</head>
<body>
<nav>
			<p><a href ="Index.html" class ="shinshi"> SHINSHI </a></p> 
				<ul class = "menu">
					<li><a href = "Index.html"> Home </a> </li>
					<li><a href = "shop.html"> Shop </a></li>
					<li><a href = "about.html"> About Us </a></li>
					<li><a href = "#"> Contact Us </a></li>
				</ul>
				
				<ul class = "accountMenu">
					<li><a href = "profile.php"> <img src = "profile.jpg"> </a> </li>
					<li><a href="cart.php"><img src="cart.jpg" alt="cart" ></a></li>
				</ul>
		</nav>
<div style="width:700px; margin:50 auto;">

		
<center><h1>CART</h1>  </center> 
<br>
<?php
//if(!empty($_SESSION["shopping_cart"])) {
//$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<!--<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>-->
<?php
//}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="cart-table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>

</tr>	

<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>

<td><img src='<?php echo $product["image"]; ?>' width="80" height="80" /></td>
<td ><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select  name="quantity" class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>

<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>

<td class="total" colspan="5" align="right">
<strong >TOTAL: <?php echo "$".$total_price; ?></strong>
</td>

</tr>


</tr>
</tbody>
</table>
<br>
   <div style="text-align:right;"><button onclick="window.location.href='paymentTest.php'"class="checkout">Checkout</button>
  
	<br>
	<a style="position: absolute; right: 422px;"class="shop" href="shop.html" >continue shopping</a>
	</div>
  <?php
}else{

echo "<hr>";

	echo "<br><h3>Your cart is empty!</h3> <br>";
	echo "<hr>";
	echo"<a  style='margin: 0 auto; display:block; text-align: center;' class='continue' href='shop.html' >continue shopping</a>";
	}
?>
</div>

<div style="clear:both;"></div>




<br /><br />

</div>
</body>
</html>