<?php
session_start();
require_once "./functions/session_helpers.php" ;
if (isLoggedIn()) header("Location: views/dashboard.php");
else header("Location: views/login.php");
