<?php
    require "functions.php";

    if(isset($_POST['reg-btn'])){
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if($password == $password2){
            $passhash = password_hash($password, PASSWORD_BCRYPT);
            $username = $_POST['username'];
            $email = $_POST['email'];
            Reg($username,$passhash,$email);
        }else{
            echo '<script>alert("Nem egyezik a jelszo!")</script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- ICON LINK -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/hatter.css">
    <link rel="stylesheet" href="assets/css/reg_login.css">

    <title>BarMerre</title>
</head>
<body>
    <div class="wrapper">
        
        <div class="bg-szurke regist kozep p-4 text-white">
            <h1 class=" text-center">Regisztracio</h1>
            <form action="regist.php" method="post">
                <div class="i-box">
                    <input type="text" name="username" placeholder="Felhasznalo">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="i-box">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="text" name="password" placeholder="Jelszo">
                </div>
                <div class="i-box">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="text" name="password2" placeholder="Jelszo ujra">
                </div>
                <div class="i-box">
                    <i class='bx bxs-envelope' ></i>
                    <input type="text" name="email" placeholder="Email cim">
                </div>
                <div class="cbox">
                    <label>
                        <input type="checkbox" class="checkbox" required="">
                        <span>18. életévemet betöltöttem</span>
                    </label>
                </div>
                <div class="cbox">
                    <label>
                        <input type="checkbox" class="checkbox" required="">
                        <span>Elfogadom az 
                            <a href="adatvedelem/adatvedelem.html">Adatvédelmi tájékoztatót</a>
                        </span>
                    </label>
                </div>
                <div class="btndiv">
                    <input class="btn" type="submit" name="reg-btn" value="RegBTNAJKHSGDKAJS!">
                </div>
                <div class="kukimuki">
                    <p>Van mar fiokod?<a href="login.php">Lepj be!</a></p>
                </div>
            </form>
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
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        <div class="bubidiv"><span></span></div>
        
        


        
        
    </div>
</body>
</html>