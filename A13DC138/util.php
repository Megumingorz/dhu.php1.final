<?php
function redirect_to($url){
    header('Location: ' . $url);
    exit();
}

function authenticate($username, $password){
    if ( ($username == 'user' && $password == 'user.pass')||
         ($username == 'admin' && $password == 'admin.pass') ) {
        session_start();
        session_regenerate_id();
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

function savefilepath(){
    $files = scandir('items');
    $max = '';
    foreach ($files as $f) {
        if ( $f !== "." && $f !== ".." && $max < basename($f, '.txt')) {
            $max = basename($f, '.txt');
        }
    }
    return 'items/' . ($max + 1) . '.txt';
}

function signout(){
    session_start();
    session_destroy(); // セッションの中身の破棄
}

function signed_in(){
    return isset($_SESSION['username']);
}