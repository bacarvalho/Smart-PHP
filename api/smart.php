<?php
// SDK de Mercado Pago
require __DIR__ .  '../../vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken("TEST-6293089179538630-042820-1041b6f109ae8217055cc38da9073d55-200797394");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Creo datos del comprador
/*$payer = new MercadoPago\Payer();
$payer ->name = 'Mi producto';
$payer ->surname = "Crack";
$payer ->email = "test_user_25816059@testuser.com";
$payer ->date_created = "1999-04-02T12:58:41.425-04:00";

$payer ->phone = array(
  "area_code" => "011",
  "number" => "949 128 866"
);
$payer ->identification = array(
  "type" => "DNI",
  "number" => "12345678"
);
$payer ->address = array(
  "street_name" => "Posta",
  "street_number" => 4789,
  "zip_code" => "1470"
);*/


// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi Ferrari';
$item->quantity = 1;
$item->unit_price = 50000;
$preference->items = array($item);

// Redireccionamiento
$preference->back_urls = array(
    "success" => "https://www.tu-sitio/succes",
    "failure" => "https://www.tu-sitio/failure",
    "pending" => "https://www.tu-sitio/pending"
);
$preference->auto_return = "approved";
$preference->nootification_url = "https://sarasa.requestcatcher.com/";
/* //MercadoEnvios
$shipments = new MercadoPago\Shipments();
$shipments->mode = "me2";
$shipments->dimensions = "30x30x30,500";
$shipments->default_shipping_method = 73328;
$shipments->free_methods = array(
  array("id"=>73328)
);

$shipments->receiver_address=array(
      "zip_code" => "5700",
      "street_number" => 123,
      "street_name" => "Street",
      "floor" => 4,
      "apartment" => "C"
);*/

$preference->save();

echo $preference->init_point;

?>