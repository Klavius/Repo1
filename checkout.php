<?php
// Este hace un pago  sin solicitar credenciales

require_once 'settings.php';

$nonce = $_POST["payment_method_nonce"];


$result = Braintree_Transaction::sale(array(
  "amount" => $_POST['amount'],
  'paymentMethodNonce' => $nonce,
  'options' => array(
    'submitForSettlement' => true,
	
  ),

));	
	
if ($result->success) {
  print_r("Success ID: " . $result->transaction->id);
} else {
  print_r("Error Message: " . $result->message);
}
?>