<!doctype html>
<html>
<?php include ("../api/smart.php");?>
  <head>
    <title>Pagar</title>
  </head>
  <body> 
  <form action="/procesar-pago.php" method="POST">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
  </body>
</html>