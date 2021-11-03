<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start() ;

function quickFlashError($message){
    $_SESSION['quick-flashed-error'] = $message ;
}

function quickFlashMessage($message){
    $_SESSION['quick-flashed-message'] = $message ;
}

function login($email, $password){
    return trim($email) == 'arjunq21@gmail.com' && trim($password) == 'asdfasdf' ;
}

function isLoggedIn(){
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true ;
}