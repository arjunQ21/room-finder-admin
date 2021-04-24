<?php
$pageTitle = "Room Finder Admin | Dashboard" ;
require_once "parts/header.php" ;
require_once "../configs/loader.php" ;

//showing all rooms in system
$sql="SELECT * from rooms";
$result=mysqli_query($connection,$sql);
$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<h2 class='light-heading'>Welcome to RoomFinder Admin. <br> <small><?= sizeof($arr) ?> Rooms found.</small> </h2>

<?php require_once "parts/footer.php"; ?>


