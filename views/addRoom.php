<?php
$pageTitle = "Room Finder Admin | Dashboard" ;
require_once "parts/header.php" ;
?>

<h2>Add New Room </h2>

<form action="/controllers/addRoom.php" method="POST" >
<table class = 'inputTable' >
    <tr>
        <td>Name</td>
        <td>
            <input type="text" name='room_name' placeholder="Enter new room's Name" required>
        </td>
    </tr>
    <tr>
        <td colspan='2'><input type="submit" value="Create New Room"></td>
    </tr>
</table>
</form>

<?php require_once "parts/footer.php"; ?>


