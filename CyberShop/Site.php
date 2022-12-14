<!-- Calls header template from "header" page -->
<?php
session_start();
require_once "header.php";
?>
  <body>
	<!--bootstrap grid system to make site responsive-->
	<div class="container">
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mx-auto text-center myClass">Mark Fisher Cyber Shop</div>		
		</div>
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 text-center myClass3"><button onclick="regFunction()"><+> Register! <+></button> </div>	
		
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 text-center myClass4"><button onclick="loginFunction()">>> Log in! <<</button> </div>	
			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 text-center myClass5"><a href="CartPage.php"><button><$> Go to Cart! <$></button></a> </div>	
		</div>
		<br>
		<div class="row">
		<!--Button to play music on site-->
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 mx-auto text-center myClass2"><audio controls autoplay>
		 <source src="landslidesremaster2.mp3" type="audio/mpeg">
		 </audio> </div>
		</div>
		<br>
		<div class="row">
		<!--Main GIF moving image on site homepage-->
		<div class="col-xl-12 col-lg-10 col-md-8 col-sm-6 col-4 mx-auto text-center myClass2"><img src="GedGef.gif" class="img-fluid"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-8 mx-auto text-center"><?php
		//Create database connection
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpassword = "";
		$dbname = "G00398383";
		
		$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		//Test if connection occured
		if(mysqli_connect_errno()){
			die("DB connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() . ")"
					);
		}

	if (!$connection)
		{
			die('Could not connect: ' . mysqli_error());
		}
		
		//Perform Database Query
		$result = mysqli_query($connection,"SELECT * FROM Products");
		
		//User returned data
		echo "<table border='3' border: id='myTable' bgcolor='lightgrey'>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price (in euro)</th>
		<th>Image</th>
		<th>Add to Cart</th>
		</tr>";
		//Create table using fields from database, grey out "add to cart" button if user not logged in
		$user = $_SESSION['user'] ?? null;
		
		$disabled = $user ? '' : 'disabled ';
		
		while($row = mysqli_fetch_array($result))
		{
			$onClick = "addToCart(" . $user . ", " . $row["ID"] . ")";
			echo "<tr>";
			echo "<td>" . $row['ID'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Price'] . "</td>";
			echo '<td><img width="50px" src="' . $row['ImageURL'] . '"></td>';
			echo '<td><button ' . $disabled . 'onclick="' . $onClick . '">Add to Cart</button></td>';
			echo "</tr>";
		}
		
		echo "</table>";
		
		
		//4.  Release returned data 
		mysqli_free_result($result);

		
		
		//5.  Close database connection
		mysqli_close($connection);
		
	?></div>	
		</div>
	<br>
	</div>
  
 
  
	<!--bootstrap below, I don't know what exactly it does but the only bootstrap used throghout this document was the grid system for responsiveness.
	I guess it's necessary for that. I have not tried ommitting the below from the code -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</div>
</form>
	
	
  </body>
</html>

<script>
<!--function to register an account on the site with variables uname and pass. Store details of user to database and display an alert when registration successful. See "register.php" Page for more.-->
function regFunction(){
const uname = prompt("Choose your username:");
const pass = prompt("Choose your password:");
if (uname && pass) {
	const data = 'username=' + uname + '&password=' + pass;
	$.ajax({
		url: 'register.php',  
		type: "POST",    
		data: data,
		cache: false,
		success: function (html) {
			alert ("You have registered to Mark Fisher Cybershop! Log in to view your cart!")
		}         
	});
} else {
alert ("You must enter your details to register! Please try again!")
}
}
<!--function to  log in with a registered account on the site with variables username and password. Store details of user to database and display an alert when log in successful, or an alternative alert when login fails. Reloads the page automatically after log in to allow usage of "Add to cart" buttons. See "login.php" Page for more.-->
function loginFunction(){
const username = prompt("Enter your username:");
const password = prompt("Enter your password:");
const data = 'username=' + username + '&password=' + password;
$.ajax({
	url: 'login.php',  
	type: "POST",    
	data: data,
	cache: false,
	success: function (data) {
		if (data) {
			location.reload();
			alert(
			"You have logged in to Mark Fisher Cybershop! Refresh the page to shop and view your cart."
			);
		} else {
			alert(
				"Wrong username or password. Please register a new account or try again!"
			);
		}
	}         
});
}
<!--Function to allow users to add products to cart. Sends details to database and displays an alert when products added. See "cart.php" Page for more.-->
function addToCart(userid,productid){
	const data = 'userid=' + userid + '&productid=' + productid;
	$.ajax({
		url: 'cart.php',  
		type: "POST",    
		data: data,
		cache: false,
		success: function (html) {
			alert('Product added to cart');
		}         
	});
}
<!--Function that changes the page background to a flipped version of the same background at random intervals. For aesthetic purposes only. Gives the illusion of movement to the site, or of a visual flash happening at random intervals. Used on every page of the site.-->
var i = 0;

function randomFlash() {
    var myFunction = function() {
    	if (i % 2 == 0) {
		document.body.style.backgroundImage = "url('lOXvRlFbluescript.jpg')";
		var random = 100;				
        } else {
          	document.body.style.backgroundImage = "url('lOXvRlFblue.jpg')";
		var random = Math.round(Math.random() * (5500 - 500)) + 500;
        }
        i++;
        setTimeout(myFunction, random);
    }
    myFunction();
}

randomFlash();

</script>