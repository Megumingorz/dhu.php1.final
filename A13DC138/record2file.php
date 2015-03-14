<?php
require_once('util.php');
session_start();

$token = $_POST['token'];
$date = $_POST['date'];
$content = $_POST['content'];
$payment = $_POST['payment'];
$receive = $_POST['receive'];

if ($payment == '') {
    $payment = 0;
}
if ($receive == '') {
    $receive = 0;
}

function verify_token($token){
    return isset($_SESSION['token']) && $token == $_SESSION['token'];
}
if (!verify_token($token)){
    redirect_to('record.php');
}

if ( ($handle = fopen(savefilepath(), 'wb')) !== false) {
    fwrite($handle, $date . ',' . $content . ',' . $payment . ',' . $receive);
    fclose($handle);
}

redirect_to('list.php');