<?php
require_once "../configs/loader.php" ;
$pageTitle = "Edit Room | Room Finder Admin" ;
try{
    $roomId = (int) $_GET['id'] ;
    $room = roomById($roomId) ;
}catch(Exception $e){
    quickFlashError("Error finding room: " . $e->getMessage()) ;
}
require_once "parts/header.php" ;
?>
<?php 



?>
<?php if(isset($room)){ ?>

    <h2>Edit Room Details</h2>

    <form action="/controllers/editRoom.php" method="POST" enctype="multipart/form-data">
<table class = 'inputTable' >
<?php 
$properties = require_once "../configs/room_properties.php" ;
?>
<?php foreach($properties as $propertyName => $details){ 
    $inputType = "" ;
    switch($details['type']){
        case 'string':
            $inputType = 'text' ;
            break ;
        case 'integer':
            $inputType = 'number' ;
            break ;
        case 'image':
            $inputType = 'file' ;
            break ;
    }
    $isRequired = isset($details['required']) && $details['required'] ;
    $oldValue = $room[$propertyName] ;
    ?>

    <tr>
        <td><?= $details['name']?> </td>
        <td>
            <input 
            value="<?= ($propertyName != 'image') ? $oldValue : '' ?>" 
            type="<?= $inputType ?>" 
            name='room_<?= $propertyName ?>' 
            placeholder="Enter <?= $details['name']?>"
            <?php if($isRequired) echo 'dasd-required'; ?>
            >
            <?php 
                if(($propertyName == 'image') && !empty($oldValue)){ ?>
                    <div style="height: 200px; width: 200px; overflow: hidden; background: url('../<?=$oldValue?>') ; display: inline-block; background-size: contain; background-repeat: no-repeat ; background-position: center;"></div>
            <?php }  ?>
        </td>
    </tr>
<?php } ?>
<input type="hidden" name='room_id' value='<?= $room['id']?>'>
    <tr>
        <td colspan='2'><input type="submit" value="Update Room Details"></td>
    </tr>
</table>
</form>

<?php } else echo "<h2> room not found</h2>" ;?>



<?php require_once "parts/footer.php"; ?>


