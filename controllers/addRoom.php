<?php
require_once "../configs/loader.php" ;


try{
    //validation
    if(!isset($_POST['room_name'])) throw new Exception("room_name not found") ;
    $m ;
    if(preg_match("/[;=]+/", $_POST['room_name'], $m)){
        throw new Exception( "Invalid Input pattern found.") ;
    }
    $sql = "Insert into rooms(name) values('".$_POST['room_name']."')" ;
    
}catch(Exception $e){
    quickFlashError($e->getMessage()) ;
    header("Location: ../views/addRoom.php") ;
}

$result = mysqli_query($connection, $sql ) ;
if($result){
    $newId = mysqli_insert_id($connection) ;
    quickFlashMessage("New Room Added.") ;
    header("Location: ../views/editRoom.php?id=".$newId) ;
}else{
    quickFlashError("Some Errors Occurred. " . mysqli_error($connection)) ;
    header("Location: ../views/addRoom.php") ;
}
