<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- ICON LINK -->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <!-- CSS -->
     <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../assets/css/hatter.css">
     <link rel="stylesheet" href="../../assets/css/style.css">
     <link rel="stylesheet" href="../../assets/css/profile.css">
     
 
     <script src="http://code.jquery.com/jquery-latest.js"></script>
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/js/main.js"></script>

    <title>BarMerre</title>
</head>
<body>
    <div class="wrapper">
        <header id="navbar" class="pb-5"></header>
        <div class="container bg-szurke">
            <div class="p-3">
                <div>
                    <img class="profimg" src="../../assets/img/default.png" alt="Profilkep">
                </div>
                <div>
                    <div class="userinfo text-white">
                        <p><a href="profilesettings.html"><button>Profilod szerkesztése</button></a></p>
                        <p>Felhasználónév: <?= $_SESSION['username']?></p>
                        <p>Email cím: <?= $_SESSION['email']?></p>
                        <?php
                            if($_SESSION['is_verify'] == 0){
                        ?>
                            <p>Hitelesített-e: Nem</p>
                        <?php }else{?>
                            <p>Hitelesített-e: Igen</p>
                        <?php }?>
                        
                        
                    </div>
                </div>
            </div>
            
               
            
           
        </div>


        <footer class="footer">
            <p>BarMerre Weboldal 2023</p>
        </footer>

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
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('#navbar').load("../../navbar.php");
</script>