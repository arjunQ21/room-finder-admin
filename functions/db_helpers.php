<?php
require_once "../configs/loader.php" ;


function roomById($roomId){
    global $connection ;
    $roomId = (int)$roomId ;
    $sql = "select * from rooms where id = $roomId" ;
    $result = mysqli_query($connection, $sql) ;
    // var_dump($result) ;
    // die() ;
    if($result->num_rows != 1) throw new Exception("Room Not Found with id: '$roomId'.") ;
    else return mysqli_fetch_all($result,MYSQLI_ASSOC)[0];
}