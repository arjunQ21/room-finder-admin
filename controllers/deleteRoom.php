<?php
require_once "../configs/loader.php" ;


try{
    //validation
    if(!isset($_POST['room_id'])) throw new Exception("id not found") ;
    $m ;
    if(preg_match("/[;=]+/", $_POST['room_name'], $m)){
        throw new Exception( "Invalid Input pattern found.") ;
    }


    $room = roomById($_POST['room_id']) ;
    $sql = "Delete from rooms where id = " .$room['id'];

    mysqli_query($connection, $sql) ;

    if(! ($errs=  mysqli_error_list($connection))){
        quickFlashMessage("Deleted.") ;
        header("Location: ../views/dashboard.php") ;
    }else{
        quickFlashError(implode(', ',$errs)) ;
    }

}catch(Exception $e){
    quickFlashError($e->getMessage()) ;
    header("Location: ../views/editRoom.php?id") ;
}



