<?php
    require "config.php";
    session_start();

    $lekerd = "SELECT * FROM users WHERE id=$_GET[id]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/profsettings-style.css">

    <title>BarMerre</title>
</head>
<body>
    <header>
        <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            <a href="tutorial.php" class="nav-a">Bemutató</a>
            <a href="allroutes.php" class="nav-a">Útvonalak</a>
            <a href="createroute.php" class="nav-a">Tervezés</a>
            <button class="btnLogin dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$user['id']?>">Beállítások</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
        </nav>
    </header>
    <div class="buborek">
        <div class="all-content mb-5">
            <div class="container rounded ">
                <div class="row">
                    <div class="col-md-12 text-white">
                        <div class="d-flex flex-column align-items-center text-center p-5"><h3 class="font-weight-bold ">Username</h3><span>email@gmail.com</span><span> </span></div>
                    </div>
                        <div class="col-md-12">
                            <div class="p-3 text-white">
                                <div class="justify-conent-center align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>
                                <div class="mt-2">
                                    <div class=""><label class="labels">Username</label><input type="text" class="form-control" value="" placeholder="Username"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email" value=""></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" placeholder="enter password" value=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5"><button class="btn settings-btn profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>
            </div>
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

    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function Logout() {
            window.location="logout.php";
        }
    </script>
</body>
</html>