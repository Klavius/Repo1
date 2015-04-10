<?php

require_once 'settings.php';


$nonce = $_POST["payment_method_nonce"];

$result = Braintree_Transaction::sale(array(
  'amount' => '7.7',
  'orderId' => 'OR-123456',
  'paymentMethodNonce' => $nonce,
  'customer' => array(
    'firstName' => 'Gerardo',
    'lastName' => 'Ortiz',
    'company' => 'Klavius Inc.',
    'phone' => '312-555-1234',
    'fax' => '312-555-1235',
    'website' => 'http://www.paypal.com',
    'email' => 'ortiz_gerardo@hotmail.com'
  ),
  'billing' => array(
    'firstName' => 'Gerardo',
    'lastName' => 'Ortiz',
    'company' => 'Klavius Inc.',
    'streetAddress' => '1 E Main St',
    'extendedAddress' => 'Suite 403',
    'locality' => 'Mexio',
    'region' => 'DF',
    'postalCode' => '14050',
    'countryCodeAlpha2' => 'MX'
  ),
  'shipping' => array(
    'firstName' => 'Gerardo',
    'lastName' => 'Ortiz',
    'company' => 'Klavius Inc.',
    'streetAddress' => '1 E Main St',
    'extendedAddress' => 'Suite 403',
    'locality' => 'Mexio',
    'region' => 'DF',
    'postalCode' => '14050',
    'countryCodeAlpha2' => 'MX'
  ),
  'options' => array(
    'submitForSettlement' => true,
	 'storeInVaultOnSuccess' => true,
	  'failOnDuplicatePaymentMethod' => true
  ),
  'channel' => 'MyShoppingCartProvider'
));


if ($result->success) {
    print_r("success!: " . $result);
} else if ($result->transaction) {
    print_r("Error processing transaction:");
    print_r("\n  code: " . $result->transaction->processorResponseCode);
    print_r("\n  text: " . $result->transaction->processorResponseText);
} else {
    print_r("Validation errors: \n");
    print_r($result->errors->deepAll());
}
echo "\n  Customer ID: "  . $result->transaction->customerDetails->id  ;
?>