
<style>
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

	.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #ED8538;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}



/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
	tr {
   vertical-align: top;
		background-color: white;
}

</style>
<html>
	<head>
<title>Checkout</title>

	<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
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
					<li><img src = "profile.jpg"> </li>
					<li><img src = "cart.jpg"> </li>
				</ul>
		</nav>
	
	
	

	

  <div class="col-75">
    <div class="container" style="margin-top: 50px;"><h2>Online Checkout</h2>
      <form action="insertsale.php">

        <div class="row">
          <div class="col-50">
			  
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            
          
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccNum" name="ccNum" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expMonth" name="expMonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expYear" name="expYear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
		<input type='hidden' name='bookID' value='<?php echo "$bookID";?>'/> 
		<input type='hidden' name='total' value='<?php echo "$total";?>'/>
        <input type="submit" value="place order" class="btn">
      </form>
    </div>
  </div>


	
	
</body>
</html>                                                                                                                                                                                                                                                                                                                                   