<?php
require_once('util.php');
session_start();

$lines = file($_FILES['attachment']['tmp_name']);

foreach ($lines as $l) {
    if ( ($handle = fopen(savefilepath(), 'wb')) !== false) {
        fwrite($handle, $l);
        fclose($handle);
    }
}

redirect_to('list.php');