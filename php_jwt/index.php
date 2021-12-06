<?php
require 'JwtHandler.php';
$jwt = new JwtHandler();

$token = $jwt->_jwt_encode_data(
    'http://localhost/php_jwt/',
   // array("email"=>"john@email.com","id"=>21)
    array(
        "email"=>"snease@sixmonthsmiles.com",
        "firstName" => "Scott",
        "lastName" => "Nease", 
        "mMetaId"=>18183, //Will hold the user’s PRC ID
        "mMeta"=>"GBR",)
);

echo "<strong>Your Token is -</strong><br> $token";
?>

<!--https://www.w3jar.com/how-to-implement-the-jwt-with-php/-->