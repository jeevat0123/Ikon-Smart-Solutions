<?php
require_once 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION["code"]!=$_REQUEST["captcha"]){
    http_response_code(400); 
    die("invalid captcha");
}

$url = 'https://logoforbusiness.co.in/Enquiry/email.php';

// Data to be sent
$data = array(
    'name' => $_REQUEST['name'],
    'email' => $_REQUEST['email'],
    'mobile' => $_REQUEST['mobile'],
    'interstedin' => $_REQUEST['interstedin'],
    'mail'=>$mail
);

$data_string = json_encode($data);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'local-php-client');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array(
        'Content-Type:application/json'
    )
);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);

try {
    $response = curl_exec($ch);

    if ($response === false) {
        throw new Exception(curl_error($ch));
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode >= 400) {
        throw new Exception($response);
    }
    echo $response;
    //header("Location: https://{$_SERVER['SERVER_NAME']}");

} catch (Exception $e) {
    http_response_code(400); 
    echo  $e->getMessage()." on mail server.";
} finally {
    curl_close($ch);
}
