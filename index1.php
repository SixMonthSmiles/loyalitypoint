<?php
$iv = '{Yr5xwjQp0:\EC4L';
$key = 'm78gLMbPQ';
 
$f_name = 'Test'; // First Name of the user
$l_name = 'Test'; // Last Name of the user
$email = 'test@web2friends.com'; // Email id of the user
$salt_str = '0.43753952'; // Live: 0.3171718  Beta : 0.049324393
$m_metaid = '301118'; // PRC code
$m_meta = 'GBR'; // Country code
$p_type = 'USER'; // Provider Type


$encryptedEmail = base64_encode(aes256_cbc_encrypt($key, $email, $iv));
$tsKey = round(microtime(true) * 1000);

$ssoEncryptedKey = md5($email.$tsKey.$salt_str);

echo 'https://s3.amazonaws.com/6monthsmiles.nextbee.com/index.html?firstName='.$f_name.'&lastName='.$l_name.'&encryptedEmail='.($encryptedEmail).'&tsKey='.$tsKey.'&ssoEncryptedKey='.($ssoEncryptedKey).'&mMetaId='.$m_metaid.'&mMeta='.$m_meta.'&NextBeeGroup='.$p_type;


function aes256_cbc_encrypt($key, $data, $iv) {
    if (32 !== strlen($key))
        $key = hash('SHA256', $key, true);
    if (16 !== strlen($iv))
        $iv = hash('MD5', $iv, true);
    $padding = 16 - (strlen($data) % 16);
    $data .= str_repeat(chr($padding), $padding);
    return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
}
	 
 
?>
