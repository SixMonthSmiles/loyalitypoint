<?php
// require __DIR__ . '/vendor/autoload.php';
use Firebase\JWT\JWT;
date_default_timezone_set('UTC');
JWT::$timestamp = time();
$secret = "0.3171718";
$advertiserId="1774";
$programId="3711";
$key=md5($secret.$advertiserId.$programId);
$data = array(
    "email"=>"test@web2friends.com",
    "firstName" => "first2",
	"lastName" => "last2", 
    "mMetaId"=>"99999", //Will hold the user’s PRC ID
    "mMeta"=>"99999",//Will hold the user’s country code [Ex: GBR...]
    "groupName" => "group_name", //Will hold the Provider Type

);


$sub=base64_encode(json_encode($data));
$exp=15*60;
$payload=array(
	'iss'=>follet,
	'sub'=>$sub,
	'iat'=>JWT::$timestamp,
	'exp'=>JWT::$timestamp+$exp    
);

$jwt = JWT::encode($payload, $key);

	$ssourl = 'https://s3.amazonaws.com/6monthsmiles.nextbee.com/index.html?token='.$jwt;
    
    header('Location: '.$ssourl);

?>
