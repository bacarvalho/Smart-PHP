<!doctype html>
<html>
  <head>
    <title>Pagar</title>
  </head>
  <body> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <form action="../api/tokenize.php" method="POST">
  <script src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
    data-public-key="TEST-50bd1a00-d3b4-468e-9737-e3e0a1dd4d21"
    data-summary-product-label="4 productos"
    data-transaction-amount="150.00"
    data-button-label="Comprar" 
    data-elements-color="#FC9629"
    data-open="true"
    >
  </script>
</form>
  </body>
</html>    