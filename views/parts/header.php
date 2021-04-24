<?php 
if(session_status() != PHP_SESSION_ACTIVE) session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Room Finder Admin" ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">    
</head>
<body>
<header>
Room Finder Admin 
</header>
<div id="with-nav">
    <nav>
    <a href="/views/dashboard.php"> Dashboard </a>
    <a href="/views/addRoom.php"> Add Room </a>
    <!-- <a href="/views/rooms.php"> Dashboard </a> -->
    </nav>
    <div id="content">

        <?php if(isset($_SESSION['quick-flashed-error'])){ ?>
            
            <div class="error">
                <p>
                    Error: <?= $_SESSION['quick-flashed-error'] ?>
                </p>
            </div>

        <?php unset($_SESSION['quick-flashed-error']) ; } ?>

        <?php if(isset($_SESSION['quick-flashed-message'])){ ?>
            
            <div class="message">
                <p>
                    <?= $_SESSION['quick-flashed-message'] ?>
                </p>
            </div>

        <?php unset($_SESSION['quick-flashed-message']) ; } ?>