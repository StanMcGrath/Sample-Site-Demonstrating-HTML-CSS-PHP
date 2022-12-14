<!-- Calls header template from "header" page -->
<?php
session_start();
require_once "header.php";
?>
<!-- Styles paragraph background of "cart empty" paragraph displayed if cart is empty.-->
<style>
p {
			background-color: rgb(254, 218, 254);
			}
</style>

<body>
	<!--Bootstrap to make page responsive-->
	<div class="container">
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mx-auto text-center myClass">Mark Fisher Cyber Cart</div>		
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
			<div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 col-12 mx-auto text-center">
		<?php
		$user = $_SESSION['user'] ?? null;
		
		if (!$user) {
			echo "Please login to shop!";
		} else {
			//Create connection to database
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpassword = "";
			$dbname = "G00398383";

			
			$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
			//sql query to select products from database which have been added to the users cart. 
			$sql = "SELECT products.ID, products.Name, products.Price, products.ImageURL, COUNT(product_id) AS Amount, COUNT(product_id)*products.Price AS TotalPrice FROM cart INNER JOIN products ON cart.product_id = products.id WHERE user_id = $user GROUP BY product_id";
			$result = mysqli_query($connection,$sql);

			if ($result->num_rows == 0) {
				echo "<p>Cart empty</p>";
			} else {
			
				//User returned data- below code block returns data from above sql query into a table where user can view order details and check out.
				echo "<table border='3' border: id='myTable' bgcolor='lightgrey'>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price (in euro)</th>
				<th>Image</th>
				<th>Amount</th>
				<th>Total Price (in euro) </th>
				<th>Check Out</th>
				</tr>";

				$sum = 0;
				
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>" . $row['ID'] . "</td>";
						echo "<td>" . $row['Name'] . "</td>";
						echo "<td>" . $row['Price'] . "</td>";
						echo '<td><img width="50px" src="' . $row['ImageURL'] . '"></td>';
						echo "<td>" . $row['Amount'] . "</td>";
						echo "<td>" . $row['TotalPrice'] . "</td>";
					echo "</tr>";
					$sum += $row['TotalPrice'];
				}

				echo "<tr><td></td><td></td><td></td><td></td><td></td><td>" . $sum . '</td><td><a href="CheckOutPage.php"><button><$$$>Checkout!<$$$></button></a></td></tr>';
				echo "</table>";
			}

			mysqli_free_result($result);
			mysqli_close($connection);
		}
		?>
	</div>
	</div>
	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

<script>
<!--Same function described in "Site.php" page which flips the background image at random intervals-->
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