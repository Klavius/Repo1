<html>

<body>

<form id="checkout" method="post" action="./creaCliente.php">
  <div id="paypal-container"></div>
 <br>

	<input type="hidden"  id="input_amount" name="amount"  value="">

			<input type="submit" value="Enviar Pago">

</form>

<script src="https://js.braintreegateway.com/v2/braintree.js"></script>

<?php

require_once 'settings.php';

// $clientToken = Braintree_ClientToken::generate();
$clientToken = Braintree_ClientToken::generate(array(  "customerId" => "74497174" ));

 $monto=50.10; 
 //BLAH BLAH BLAH
?>


<script  type="text/javascript">
function showBtnSubmit(obj) {

		document.getElementById("btn_submit").style.display = "block";
		document.getElementById("input_amount").value=<?=  $monto ?> ;
}

  braintree.setup(
    // Replace this with a client token from your server
    "<?=  $clientToken ?>",
    "paypal",
	{
      container: 'paypal-container' ,
	  singleUse: false,
	  locale: 'es-ES',
	  currency: 'USD',
	  displayName: 'Klavius Co.',
	  amount: <?=  $monto ?> ,
	  enableShippingAddress: 'True',
	  
	  onPaymentMethodReceived: function (obj) {
		showBtnSubmit(obj);
	  } 	,
	  onCancelled: function(obj) {
		alert("Cancelado");
	  },
    });
</script>

</body>

</html>