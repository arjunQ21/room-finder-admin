<?php
require_once "../configs/loader.php" ;
$properties = require_once "../configs/room_properties.php" ;

$validationErrors = [] ;
if(empty($_POST['room_id'])){
    quickFlashError("Room ID not found.") ;
    header("Location: ../index.php") ;
}
$roomId = (int)$_POST['room_id'] ;
$m ;

$sql = 'update rooms set   ';
// validation
foreach($properties as $propertyName => $details){

    // required validation
    if(isset($details['required']) && $details['required']){
        if(empty($_POST['room_'.$propertyName])){
            $validationErrors[] = $details['name'] . " cannot be empty." ;
        }
    }

    // string validation
    if($details['type'] == 'string'){
        
        if(preg_match("/[;=]+/", $_POST['room_'. $propertyName], $m)){
            $validationErrors[] =  "Invalid Input pattern found in ". $details['name'] ;
        }else{
            if(!empty($_POST['room_'.$propertyName]))
            $sql .= $propertyName. " = '".$_POST['room_'.$propertyName]."', ";
        }

    }
    // number validation
    if($details['type'] == 'integer'){
        
        if(preg_match("/[^0-9]+/", $_POST['room_'. $propertyName], $m)){
            $validationErrors[] =  "Invalid Input pattern found in ". $details['name'] ;
        }else{
            if(!empty($_POST['room_'.$propertyName]))
            $sql .= $propertyName. " = ".$_POST['room_'.$propertyName].", ";
        }

    }

}
// extra validations

//image part
// print_r($_FILES) ;
// die() ;
if(!empty($_FILES['room_image']) && !$_FILES['room_image']['error']){
    if(explode('/', $_FILES['room_image']['type'])[0] != 'image'){
        $validationErrors[] = "Invalid File type. Only images are accepted." ;
    }else{
        $fileName = "assets/images/rooms/$roomId-".getdate()[0].".".pathinfo($_FILES['room_image']['name'], PATHINFO_EXTENSION) ;
    
// print_r($_SERVER) ;

        // saving image in folder
        move_uploaded_file($_FILES['room_image']['tmp_name'], __DIR__. "/../$fileName") ;
        $sql .= "image = '$fileName', " ;
    }

}


// after validation
if(sizeof($validationErrors) > 0){
    quickFlashError(join('<br>', $validationErrors)) ;
}else{
    // saving to db
    $sql = substr($sql, 0, strlen($sql) - 2) ;
    $sql .= " where id = $roomId" ;

    $res = mysqli_query($connection, $sql) ;

    if(mysqli_affected_rows($connection) == 1){
        quickFlashMessage("Record updated successfully.") ;
    }else{
        quickFlashError("Record not updated. " . mysqli_error($connection)  ) ;
    }
}
header("Location: ../views/editRoom.php?id=$roomId");