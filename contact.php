<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    if(isset($_POST['up-btn'])){
        $k_name = $_POST['k_name'];
        $v_name = $_POST['v_name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $userName = $k_name." ".$v_name;
        $conn->query("INSERT INTO contacts VALUES(id, '$userName','$email','$message')");
        echo '<script>alert("Üzenet elküldve!")</script>';
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BarMerre - Kapcsolat</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/nav-style.css">
</head>
<body class="d-flex flex-column h-100">
    
    <header>
    <h2 class="logo">BarMerre</h2>
        <nav class="navigation">
            
            <a href="tutorial.php" class="nav-a hideOnMobile">Bemutató</a>
            <a href="allroutes.php" class="nav-a hideOnMobile">Útvonalak</a>
            <a href="createroute.php" class="nav-a hideOnMobile">Tervezés</a>
            <button class="btnLogin dropdown-toggle hideOnMobile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark hideOnMobile">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><a class="dropdown-item" href="contact.php">Kapcsolat</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
            <a class="menu-button" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
            
            
            <div class="sidebar">
            <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
            <a href="tutorial.php" class="nav-a active">Bemutató</a>
            <a href="allroutes.php" class="nav-a">Útvonalak</a>
            <a href="createroute.php" class="nav-a">Tervezés</a>
            <button class="btnLogin dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
                <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><a class="dropdown-item" href="mailto:barmerre@gmail.com">Kapcsolat</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
            </div>
        </nav>
        
    </header>
    <main class="flex-shrink-0">
            
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="bg-dark py-5 mt-5">
            <div class="container-fluid px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Kapcsolat</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Vedd fel velünk a kapcsolatot</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="assets/img/logo/testlogo.png" alt="..." /></div>
                </div>
            </div>
        </div>
        </section>
        <!-- Blog preview section-->
        <section class="py-5">
        <form id="contact_form" name="contact_form" method="post">
            <div class="mb-5 row">
                <div class="col">
                    <label>Vezetéknév</label>
                    <input type="text" required maxlength="50" class="form-control" name="v_name">
                </div>
                <div class="col">
                    <label>Keresztnév</label>
                    <input type="text" required maxlength="50" class="form-control" name="k_name">
                </div>
            </div>
            <div class="mb-5 row">
                <div class="col">
                    <label for="email_addr">Email</label>
                    <input type="email" required maxlength="50" class="form-control" name="email"
                        placeholder="name@example.com">
                </div>
            </div>
            <div class="mb-5">
                <label for="message">Üzenet</label>
                <textarea class="form-control" required name="message" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4 btn-lg" name="up-btn">Küldés</button>
        </form>
    </main>
    <div class="buborek">
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
    
    
    <script src="assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
    function Logout() {
        window.location="logout.php";
    }
    function showSidebar(){
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display='flex';
    }
    function hideSidebar(){
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.display='none';
    }
    </script>
</body>
</html>