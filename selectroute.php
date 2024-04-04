<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    $id=$_GET['id'];
    $lekerd = "SELECT * FROM routes WHERE id = $id";
    $talalt = $conn->query($lekerd);
    $route = $talalt->fetch_assoc();

    $creator_lekerd = "SELECT * FROM users WHERE id = $route[creator_id]";
    $creator_talalt = $conn->query($creator_lekerd);
    $creator = $creator_talalt->fetch_assoc();

    if(isset($_POST['post-btn'])){
        $text = $_POST['text'];
        $conn->query("INSERT INTO comments VALUES(id, $id, $_SESSION[userid], '$text')");
    }

    if(isset($_POST['delete-comment-btn'])){
        $comment_id = $_GET['commentid'];
        $conn->query("DELETE FROM comments WHERE id=$comment_id");

    }

    if(isset($_POST['like-btn'])){
        
        $route_id = $_GET['routeid'];
        $conn->query("INSERT INTO likes VALUES(id, $route_id, $_SESSION[userid])");
    }

    if(isset($_POST['unlike-btn'])){
        $route_id = $_GET['routeid'];
        $conn->query("DELETE FROM likes WHERE user_id = $_SESSION[userid] AND route_id = $route_id");
    }

    if(isset($_POST['delete-btn'])){
        $route_id = $_GET['routeid'];
        $conn->query("DELETE FROM routes WHERE creator_id = $_SESSION[userid] AND id = $route_id");
        header("Location: myroutes.php");
    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $route['name'] ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
</head>
<body class="d-flex flex-column h-100">
    
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
            <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
            <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
        </ul>
    </nav>
  </header>
  <div class="bg-dark container py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?= $route['name'] ?></h1>
                                <p class="lead fw-normal text-white-50 mb-4"><?= $route['text'] ?></p>
                                <p class="lead fw-normal text-white-50 mb-4">Készítő: <?= $creator['username'] ?></p>
                                <?php
                                    $like_lekerd = "SELECT * FROM likes WHERE route_id = $route[id] AND user_id = $_SESSION[userid]";
                                    $like_talat = $conn->query($like_lekerd);
                                    
                                ?>
                                <p class="lead fw-normal text-white-50 mb-4">Likes: <?= mysqli_num_rows($like_talat); ?></p>
                                <?php
                                    if($route['creator_id'] != $_SESSION['userid']){
                                        if(mysqli_num_rows($like_talat) == 0){
                                            $like = $like_talat->fetch_assoc();
                                    
                                ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-primary" name="like-btn">Like</button>
                                    </form>
                                <?php
                                    }else{
                                ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-primary" name="unlike-btn">Unlike</button>
                                    </form>
                                <?php }}else{ ?>
                                    <form action="selectroute.php?id=<?=$id?>&routeid=<?=$route['id']?>" method="post">
                                        <button class="btn btn-danger" name="delete-btn">Törlés</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="assets/img/logo/testlogo.png" alt="..." /></div>
                    </div>
                </div>
            </div>
    
    <div class="container-fluid bg-dark mt-5">
        <div class="m-2">
            <h2 class="text-white text-center">Komment szekció</h2>
        </div>
        <div class="mt-2 justify-content-center align-items-center">
            <form action="selectroute.php?id=<?=$id?>" method="post">
            <div class="input-group p-3">
                <input type="text" class="form-control" name="text" placeholder="Kommentelj">
                <button class="btn btn-primary" name="post-btn">Küldés</button>
            </div>
            </form>
        </div>
        <?php
            $talalt_user = $conn->query("SELECT * FROM users");
            $user = $talalt_user->fetch_assoc();

            $com_lekerd = "SELECT * FROM comments WHERE route_id = $id ORDER BY id DESC";
            $com_talalt = $conn->query($com_lekerd);
            while($comment = $com_talalt->fetch_assoc()){
                $user_lekerd = "SELECT * FROM users WHERE id = $comment[user_id]";
                $user_talat = $conn->query($user_lekerd);
                $user = $user_talat->fetch_assoc();
            
        ?>
        <div>
            <h5 class="text-white" <?php if($route['creator_id'] == $comment['user_id']){echo 'style="color:red !important"';}?>><?php if(empty($user['username'])){echo "Törölt felhsználó";}else{ echo $user['username'];}?></h5>
            <p class="text-white" <?php if($route['creator_id'] == $comment['user_id']){echo 'style="color:red !important"';}?>><?= $comment['text']?></p>
            
            <?php
                if($comment['user_id'] == $_SESSION['userid'] || $route['creator_id'] == $_SESSION['userid']){
                    echo '<form action="selectroute.php?id='.$id.'&commentid='.$comment['id'].'" method="post"><button class="btn btn-primary mb-2" name="delete-comment-btn">Komment Törlés</button></form>';
                }
            ?>
            
        </div>
        <?php } ?>
        
    </div>
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
    
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function Logout() {
            window.location="logout.php";
        }
    </script>
</body>
</html>