<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start() ;

function quickFlashError($message){
    $_SESSION['quick-flashed-error'] = $message ;
}

function quickFlashMessage($message){
    $_SESSION['quick-flashed-message'] = $message ;
}