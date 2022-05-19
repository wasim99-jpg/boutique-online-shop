<?php

session_start();

if(!isset($_SESSION["loggedin"]) ){
    header("location: loginAdmin.php");
    exit;
}
?>
<html>
<head>
<style>
body
{
	background: #84563c;
	font-family: 'Raleway', sans-serif;
}
button
{
	width: 200px ;
	font-size: 20px ;
	padding: 5px ;
	border: 2px solid white ;
	text-align: center ;
	text-decoration: none ;
	color: white ;
	transition: all 0.2s;
	background: none ;
	font-family: 'Raleway', sans-serif;
}

button:hover 
{
	background:white  ;
	color: #84563c ;
	border: 2px solid white ;
}

div{
	 margin: auto;
  width: 50%;
  border: 3px solid white;
  padding: 10px;
  text-align:center;
}
h1{
	text-align:center;
	color:white;
	
}
</style>

<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&display=swap" rel="stylesheet">
</head>

<body>
<br><br>
<h1>SHINSHI ADMIN </h1>
<div><br>
<button onclick="location.href='sales.php'" type="button">
         Sales info</button><br><br>
		 <button onclick="location.href='users.php'" type="button">
         Customer info</button><br><br>
		 <button onclick="location.href='logoutAdmin.php'" type="button">
         Logout</button>

<br><br></div>
<body>
</html>