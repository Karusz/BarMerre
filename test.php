<?php
    require "config.php";
    session_start();
    $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
    $talalt = $conn->query($lekerd);
    $user = $talalt->fetch_assoc();

    $from = "";
	$to = "";

	if(isset($_POST['caclr'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
	}

    if(isset($_POST['save-btn'])){
        $from = $_GET['from'];
        $to = $_GET['to'];

        $conn->query("INSERT INTO routes VALUES(id, $_SESSION[userid], 'test', '$from;$to', 'test routes')");
    }
?>
<!DOCTYPE html>
<html lang="hu">
    <style>
        form{
			margin: 20px;
		}
        #map{
			width: 40em;
			height: 30em;
			margin: 0 auto 20px auto;
			border-radius: 20px;
			box-shadow: 0px 0px 10px #222;
		}
		#output{
			width: 600px;
			margin: 0 auto;
			text-align: center;
			background: #dedede;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #222;
		}
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- CSS -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">

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
                <li><a class="dropdown-item" href="profilesettings.php?id=<?=$_SESSION['userid']?>">Beállítások</a></li>
                <li><button class="dropdown-item" onclick="Logout()">Kijelentkezés</button></li>
            </ul>
        </nav>
    </header>
    <div class="buborek">

        <form method="post" action="test.php">
			<input type="text" name="from" id="from" placeholder="From" value="<?php if(!empty($from)){echo $from;} ?>">
			<input type="text" name="to" id="to" placeholder="To" value="<?php if(!empty($to)){echo $to;} ?>">
			<button id="calc" name="caclr">Tervezés</button>
		</form>
        <form action="test.php?from=<?=$from?>&to=<?= $to?>" method="post">
            <button class="btn btn-primary" name="save-btn">Mentés</button>
        </form>
		<div id="map"></div>
		<div id="output"></div>
        
    
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
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpybVWsR30eThdM_LVqdGelbyDSlGlBf8&libraries=places&callback=initMap"></script>
    <script src="assets/js/cal-routes.js">
        function initMap();
    </script>
    <script>
        function Logout() {
            window.location="logout.php";
        }
    </script>
</body>
</html>