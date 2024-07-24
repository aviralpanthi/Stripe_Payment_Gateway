# Stripe Payment Gateway Project
##How to Integrate Stripe Pyament Gateway to PHP:

Create a Stripe account: Go to stripe.com to create an account.
Install the Stripe PHP library.
Get API keys: Log in to your Stripe dashboard, navigate to Developers > API keys, and find the Publishable key and Secret key under Standard keys. You can click Reveal test key token to see the Secret key.
Create a PHP Project and files: Put the API keys in php file, defining constants for them.
Create a  index.php file.
Implement Stripe folder to the project and load CDN for Stripe in index.php file.
Add the CDN for JQuery, Bootstrap.
Create a basic Navbar in your index.php file.
Create a basic Card for purchasing T-shirt.
Create a basic input payment form.
Collect payment details on the client-side.
Generate a Token using Publish key.
Submit payment information to your server via POST.
Process the payment on the server-side.
Create a Stripe_payment.php file.
Check the token coming from client side to move forward.
Receiving data using $_POST method.
Put them into variables.
Require the ('stripe-php/init.php') file.
Create an array to save Test Secret key and Publish key.
Add customer to stripe.
Generate Unique order ID. 
Charge a credit or a debit card. 
Retrieve charge details :
    	$chargeJson = $charge->jsonSerialize();

Check whether the charge is successful. 
Create a Database in PhpMyadmin.
Connect to Database by creating connect.php file and incude this file to stripe payment page.
Insert tansaction data into the database.
Check the response and show to main page.
	   
	   
