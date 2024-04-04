<?php
    require "config.php";
    require "functions.php";
    if(isset($_POST['forgot-btn'])){
        $email = $_POST['email'];
        $code = CodeGenerate(5);
        
        emailsend($email, $code);
    }

    if(isset($_POST['psw-save-btn'])){
        $code = $_GET['code'];
        $email = $_GET['email'];
        $psw = $_POST['psw'];
        $repsw = $_POST['repsw'];

        if($psw == $repsw){
            $hash_psw = password_hash($psw, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password = '$hash_psw' WHERE email = '$email'");
            header("Location: login.php");
        }else{
            echo "<script>alert('Nem egyezik a két jelszó!')</script>";
        }


        
    }
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarMerre</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    
    <header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="index.php" class="nav-a">Kezdőlap</a>
        </nav>
    </header>
    

    <div class="buborek">
        <div class="wrapper">
            <?php
                if(!isset($_GET['stat'])){

            
                    if(!isset($_GET['code'])){
            ?>
                    <div class="form-box login">
                    <h2>Jelszó Emlékeztető</h2>

                    <form action="reset.php?stat=send" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <button type="submit" name="forgot-btn" class="btn">Email küldése</button>
                    </form>
                    </div>

                <?php
                    }else{
                ?>
                    <div class="form-box login">
                    <h2>Jelszó Megváltoztatása</h2>

                    <form action="reset.php" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="psw" required>
                            <label>Jelszó</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="repsw" required>
                            <label>Jelszó újra</label>
                        </div>
                        <button type="submit" name="psw-save-btn" class="btn">Jelszó mentése</button>
                    </form>
                    </div>

                    </div>
                <?php }}else{ ?>
                    <div class="form-box login">
                    <h2>Email elküldve</h2>
                    </div>
                <?php } ?>

        </div>
        <!-- Buborekok -->
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
    </div>

    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>