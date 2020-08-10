<?php  

// SDK de Mercado Pago
require __DIR__ .  '../../vendor/autoload.php';

    $token = $_REQUEST["token"];
    $payment_method_id = $_REQUEST["paymentMethodId"];
    $installments = $_REQUEST["installments"]; // No es necesario enviarlo.
    $payeremail = $_REQUEST["email"];
    $transaction = $_REQUEST["precio"];
    $issuer_id = $_REQUEST["issuerId"];


    MercadoPago\SDK::setAccessToken("TEST-6293089179538630-042820-1041b6f109ae8217055cc38da9073d55-200797394");
    //...

 /* $customer = new MercadoPago\Customer();
  $customer->email = $payeremail;
  $customer->save();

  $card = new MercadoPago\Card();
  $card->token = "9b2d63e00d66a8c721607214cedaecda";
  $card->customer_id = $customer->id;
  $card->save(); */


  // echo $customer->id;

    // API con pagos medios OFF
    /*$payment = new MercadoPago\Payment();
    $payment->transaction_amount = 100;
    $payment->description = "Title of what you are paying for";
    $payment->payment_method_id = "rapipago";
    $payment->payer = array(
      "email" => "bautidenueve@gmail.comp"
    );
    
    $payment->save();
    */
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = $transaction;
    $payment->token = $token;
    $payment->description = "Producto";
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
    "email" => $payeremail
    );
    $payment->external_reference = "Pruebatest01";
    $payment->notification_url = 'https://post.requestcatcher.com/';
    // Save and posting the payment
    $payment->save(); 

    // Print the payment status

  /*  echo $token, "/";
    echo $payment_method_id, "/";
    echo $installments, "/";
    echo $payeremail, "/";
    echo $transaction, "/";
    echo $payment->status, "/"; */

   
    //Imprimo el objeto payment
    $thearray = (array) $payment;
    var_dump( $thearray );

    $thearray = get_object_vars( $payment );
    var_dump( $thearray ); 

    echo $thearray;

?>