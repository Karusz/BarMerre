<?php
    require "config.php";
    session_start();

    $id = $_GET["id"];
    $lekerd = "SELECT * FROM users WHERE id= $id";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    if(isset($_POST['save-btn'])){
        if(!empty($_POST["new-username"])){
            $new_name = $_POST['new-username'];
            $conn->query("UPDATE users SET username = '$new_name' WHERE id=$id");
        }

        if(!empty($_POST['new-email'])){
            $new_email = $_POST['new-email'];
            $conn->query("UPDATE users SET email='$new_email' WHERE id=$id");
        }

        if(!empty($_POST['new-psw'])){
            if($_POST['new-psw'] == $_POST['new-repsw']){
               $new_psw = password_hash($_POST['new-psw'], PASSWORD_DEFAULT);
                $conn->query("UPDATE users SET password='$new_psw' WHERE id=$id"); 
            }else{
                echo "<script>alert('Nem egyeznek a jelszavak!')</script>";
            }
            
        }

        header("Refresh:0");
    }

    if(isset($_POST['delete-btn'])){
        $conn->query("DELETE FROM users WHERE id = $id");
        header("Location: index.php");
    }


?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/profsettings-style.css">
     <link rel="stylesheet" href="assets/css/nav-style.css">

    <title>BarMerre</title>
</head>
<body>
<header>
      <a href="index.php" class="logo"><h2>BarMerre</h2></a>
      <nav class="navigation">
          <a href="allroutes.php" class="nav-a hideOnMobile">Útvonalak</a>
          <a href="createroute.php" class="nav-a hideOnMobile">Tervezés</a>
          <a class="nav-a hideOnMobile" href="contact.php">Kapcsolat</a>
          <button class="btnLogin dropdown-toggle hideOnMobile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?=$user['username']?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark hideOnMobile">
              <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
              <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
              <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
          </ul>
          <a class="menu-button" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
          
          
          <div class="sidebar">
          <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
          <a href="contact.php" class="nav-a active">Kapcsolat</a>
          <a href="allroutes.php" class="nav-a">Útvonalak</a>
          <a href="createroute.php" class="nav-a">Tervezés</a>
          <button class="btnLogin dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href=""><?= $user['username'] ?></a></li>
              <li><a class="dropdown-item" href="myroutes.php">Saját utak</a></li>
              <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
              <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
          </ul>
          </div>
      </nav>
      
  </header>
    <div class="buborek">
        <div class="all-content mb-5">
            <div class="container rounded">
                <div class="row">
                    <div class="col-md-12 text-white">
                        <div class="d-flex flex-column align-items-center text-center p-5"><h3 class="font-weight-bold "><?=$user['username']?></h3><span><?=$user['email']?></span><span> </span></div>
                    </div>
                    <form action="profilesettings.php?id=<?=$user['id']?>" method="post">
                        <div class="col-md-12">
                            <div class="p-3 text-white">
                                <div class="justify-conent-center align-items-center mb-3">
                                    <h4 class="text-right">Profil Beállítások</h4>
                                </div>
                                <div class="mt-2">
                                    <div class=""><label class="labels">Felhasználónév</label><input type="text" class="form-control" name="new-username" placeholder="Felhasználónév megváltoztatása"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="new-email" placeholder="Email megváltoztatása"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Jelszó</label><input type="password" class="form-control" name="new-psw" placeholder="Jelszó megváltoztatása"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Jelszó újra</label><input type="password" class="form-control" name="new-repsw" placeholder="Jelszó újra"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3"><button class="btn settings-btn profile-button" name="save-btn" type="submit">Mentés</button></div>
                        <div class="text-center mb-5"><button class="btn delete-btn profile-button" name="delete-btn" type="submit">Fiók törlése</button></div>
                    </form>
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
</body>
</html>