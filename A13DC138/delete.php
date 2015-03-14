<?php
require_once('util.php');

$file = $_POST['file'];
$file = basename($file);

$filepath = 'items/'. $file;

unlink($filepath);