<?php

  $token = $_REQUEST["token"];
  $payment_method_id = $_REQUEST["payment_method_id"];
  $installments = $_REQUEST["installments"];
  $issuer_id = $_REQUEST["issuer_id"];

  //Mando los datos de la SDK
  require_once  '../vendor/autoload.php';

  MercadoPago\SDK::setAccessToken("TEST-6293089179538630-042820-1041b6f109ae8217055cc38da9073d55-200797394");

  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = 106;
  $payment->token = $token;
  $payment->description = "Mi Ferrari";
  $payment->installments = $installments;
  $payment->payment_method_id = $payment_method_id;
  $payment->issuer_id = $issuer_id;
  $payment->payer = array(
  "email" => "Testa@hotmail.com"
  );
  // Guarda y postea el pago
  $payment->save();

  echo "Token: $token ";
  echo "installments: $installments  "; 
  echo "Issuer_id: $issuer_id:  ";
  echo "Payment_method_id: $payment_method_id  ";
  echo $payment->status;
/*

Imprime el Payment en forma de Json. 

$thearray = (array) $payment;
var_dump( $thearray );

$thearray = get_object_vars( $payment );
var_dump( $thearray ); 

echo $thearray; */

if ($payment->status == "rejected"){
 $estado = "RECH";
}elseif ($payment->status == "approved"){
  $estado = "APRO";
} ?>

<?php if ($estado == "RECH") { ?>

<h1>¡Algo salió mal!</h1>
<p>Ha ocurrido un error con el pago. Por favor vuelve a intentarlo:</p>

<form action="tokenize.php" method="POST">
  <script
    src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
    data-public-key="TEST-50bd1a00-d3b4-468e-9737-e3e0a1dd4d21"
    data-transaction-amount="100.00"
    data-button-label="Reintentar"> <!-- Texto del botón -->
  </script>
</form>

<?php }elseif ($estado=="APRO"){?>
  <h1>¡PAGO APROBADO!</h1>
<p>GRACIAS WACHO!!</p>
<?php } ?> 