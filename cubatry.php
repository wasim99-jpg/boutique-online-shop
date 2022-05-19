<?php
session_start();

foreach ($_SESSION["shopping_cart"] as $product){
echo $product["code"];



	
}

?>