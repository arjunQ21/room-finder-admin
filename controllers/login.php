<?php
session_start() ;
require_once "../configs/loader.php" ;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        if(login($email, $password)){
            quickFlashMessage("Logged In") ;
            $_SESSION['logged_in'] = true ;
            header("Location: ../") ;
        }else{
            throw new Exception("Could not login with provided credentials.") ;
        }
    }catch(Exception $e){
        quickFlashError("Login Failed. ". $e->getMessage()) ;
        header("Location: ../views/login.php") ;
    }
}else{
    header("Location: ../views/login.php") ;
}
