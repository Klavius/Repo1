<html>
	<head>

	
	</head>
	
<body>

<form id="checkout" method="post" action="./checkout.php">
  <div id="paypal-container"></div>
 <br>

	<input type="text"  id="input_amount" name="amount"  value="11.11">

			<input type="submit" value="Enviar Pago">

</form>






<script src="https://js.braintreegateway.com/v2/braintree.js"></script>

<?php

require_once 'settings.php';

// $clientToken = Braintree_ClientToken::generate(array(  "customerId" => "66939809" ));
$clientToken = Braintree_ClientToken::generate(array(  "customerId" => "74497174" ));

 
?>


<script  type="text/javascript">


  braintree.setup(
    // Replace this with a client token from your server
    "<?=  $clientToken ?>",
    "dropin",
	{
      container: 'paypal-container' 
    });
</script>

</body>

</html>