<?php
require_once "../configs/loader.php" ;
$pageTitle = "Admin Login | Room Finder Admin" ;
require_once "parts/header.php" ;
?>

<h2>Admin Login </h2>
<form action="../controllers/login.php" method="POST">

<table>
    <tr>
        <th>Email</th> <td><input type="text" name='email'></td>
    </tr>
    <tr>
        <th>Password</th> <td><input type="password" name='password'></td>
    </tr>
    <tr>
        <th></th>
        <td>
            <input type="submit" value='Login'>
        </td>
    </tr>
</table>

</form>

<?php require_once "parts/footer.php"; ?>


