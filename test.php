<?php
    require "functions.php";
    if(isset($_POST['btn'])){
        $useremail = $_POST['email'];
        emailsend($useremail);
    }


?>
<form action="test.php" method="post">
    <input type="text" name="email">
    <button name="btn">Kuld</button>
</form>