<?php

require_once 'settings.php';

//Para hacer pagos recurrentes con el payment token




$result = Braintree_Transaction::sale(array(
	'paymentMethodToken'=>  '4gqtvr',
    'amount' => '66.66',
	  'options' => array(
    'submitForSettlement' => true
  ),

));

if ($result->success) {
    print_r("success!: " . $result->transaction->id);
} else if ($result->transaction) {
    print_r("Error processing transaction:");
    print_r("\n  code: " . $result->transaction->processorResponseCode);
    print_r("\n  text: " . $result->transaction->processorResponseText);
} else {
    print_r("Validation errors: \n");
    print_r($result->errors->deepAll());
}

print_r($result);


?>