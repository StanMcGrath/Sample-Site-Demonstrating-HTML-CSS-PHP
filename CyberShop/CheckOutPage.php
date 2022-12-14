<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Mark Fisher Cyber Shop</title>
  
  <!--Custom styling for this specific page, not using the "header" template from "header.php" Page. Styles form with a pink version of the site background image, fonts, colours, borders, background of myClass textblock (Header text), main site background image and the backgrounds of text paragraphs within the forum with a solid colour so the text is readable over the custom background image. Commenting above each line breaks the layout of the page when viewed, for some reason unknown.-->
  <style>
	
	.myForm {background-image: url("lOXvRlFpink.jpg");font-size:15px;font-weight: bold;font-family: 'Courier New', monospace; border: 6px solid rgb(186, 255, 193);
            border-style: groove;}
	
	.myClass {background-color: rgb(186, 255, 193);font-size:25px;font-weight: bold;font-family: 'Courier New', monospace; border: 3px solid rgb(186, 255, 193);
            border-style: groove;}
	
	
	body {
            background-image: url("lOXvRlFblue.jpg");
			}
	
	p {
			background-color: rgb(254, 218, 254);
			}

	legend {
			background-color: rgb(254, 218, 254);
			}		
			
  </style>
  
  </head>

  <body>
	<!--Bootstrap grid system for responsive site-->
    <div class="container">
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mx-auto text-center myClass">Mark Fisher Cybershop Checkout</div>		
		</div>
		<br>
		<div class="row">
		<!--button to play music-->
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 mx-auto text-center myClass2"><audio controls autoplay>
		 <source src="landslidesremaster2.mp3" type="audio/mpeg">
		 </audio> </div>
		</div>
		<br>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mx-auto text-left"><form method="POST" class = myForm>
        <!--all below form code, untill the closing </form> tag, including comments, was pulled directly from week 3 lectures "Credit Card Form Solutions" at https://learnonline.gmit.ie/course/view.php?id=2597-->
		<p>First Name:</p> 
        <input id="first_name" type="text" name="first name"><br><br>
        <p>Last Name:</p> 
        <input id="last_name" type="text" name="last name"><br><br>
        <p>Email Address:</p> 
        <input id="email" type="email" name="email"><br><br>

        <p>Date of Birth:</p> <input id="date_of_birth" type="date" name="date of birth"><br><br>
		
		<!-- Fieldset tag will create border - note closing tag after months.-->
        <fieldset>
		
			<!-- Legend tag will create text inset into fieldset border -->
			<legend>Credit Card Details</legend>
			
            <input type="radio" name="cardType">
            <img src="cardimg/visa.png" alt="Visa card" title="Visa card" width="30"><br>

            <input type="radio" name="cardType">
            <img src="cardimg/visaDebit.png" alt="Visa debit" title="Visa debit" width="30"><br>

            <input type="radio" name="cardType">
            <img src="cardimg/masterCard.png" alt="Master card" title="Master card" width="30"><br>

            <input type="radio" name="cardType">
            <img src="cardimg/amEx.jpg" alt="American express" title="American express" width="30"><br>

            <p>Credit Card Number:</p>
			<input id="card_number" type="number" name="creditCardNumber"><br>

            <p>Expiry Year:</p>
            <select id="expiry_year" name="expiryYear">
                <option value="2019" selected>2019</option>
				<option value="2020" >2020</option>
                <option value="2021" >2021</option>
                <option value="2022" >2022</option>
                <option value="2023" >2023</option>
                <option value="2024" >2024</option>
            </select>
            <br>

            <p>Expiry Month:</p>
            <select id="expiry_month" name="expiryMonth">
                <option value="January" >January</option>
                <option value="February" >February</option>
                <option value="March" >March</option>
                <option value="April" >April</option>
                <option value="May" >May</option>
                <option value="June" >June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>

        </fieldset>
		<br>
        <input type="submit" onclick="rebertStreng()" value="Submit Card Details and Pay!">

    </form></div>		
		</div>
		<br>

</body>

<script>
<!--This function allows the user to "pay" (click the submit button and recieve a confirmation alert) only when the correct form details are entered.-->
var i = 0;

function rebertStreng(){
	
	const formdata = {
		first_name: document.getElementById('first_name').value,
		last_name: document.getElementById('last_name').value,
		email: document.getElementById('email').value,
		date_of_birth: document.getElementById('date_of_birth').value,
		card_number: document.getElementById('card_number').value,
		expiry_year: document.getElementById('expiry_year').value,
		expiry_month: document.getElementById('expiry_month').value,
	}
	
	let payable = true;
	
	Object.keys(formdata).forEach((data) => {
		if (!formdata[data]) {
			payable = false;
		}
	});
	
	
	if (payable) {
		alert('Payment Accepted! You will recieve a confirmation email shortly.');
	}
}
<!--The same function described in comments on "Site.php" page that swaps the background image for an aesthetic effect.-->
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

</html>