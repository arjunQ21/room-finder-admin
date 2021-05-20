<?php
$pageTitle = "Room Finder Admin | Dashboard" ;
require_once "parts/header.php" ;
require_once "../configs/loader.php" ;

//showing all rooms in system
$sql="SELECT * from rooms order by id desc";
$result=mysqli_query($connection,$sql);
$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

<h2 class='light-heading'>Welcome to RoomFinder Admin. </h2>


<h3 class='light-heading'>Choose a Room to update details</h3>

<div class="has-rooms">
    <?php foreach($arr as $room){
        $image = empty($room['image']) ? "assets/images/rooms/room-default.png" : $room['image'] ;
    ?>

<div class="room" onclick = "window.location.assign('editRoom.php?id=<?= $room['id']?>');">
        <div class="r-img" style="background-image: url('../../<?= $image ?>')">
        </div>
        <div class="r-title"><?= $room['name'] ?></div>
</div>

    <?php } ?>
</div>

<?php require_once "parts/footer.php"; ?>


