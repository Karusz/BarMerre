<?php
    require "config.php";

    $lekerd = "SELECT * FROM bars";
    $talalt = $conn->query($lekerd);
    
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
     <link rel="stylesheet" href="assets/css/all-style.css">
     <link rel="stylesheet" href="assets/css/allbars-style.css">
     

    <title>BarMerre</title>
</head>
<body>
    <div class="buborek">
        <header>
            <h2 class="logo">BarMerre</h2>
            <nav class="navigation">
                <a href="index.php" class="nav-a">Kezdőlap</a>
                <a href="allbars.php" class="nav-a">Elérhető kocsmák</a>
                <button class="btnLogin" onclick="Login()">Bejelentkezés</button>
            </nav>
        </header>
  
          <div class="pagename">
              <h1>Kocsmák</h1>
          </div>
          <div class="container">
            <div class="bg-szurke text-center p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table>
                                <p class="barsnum">Kocsmák száma: <?= mysqli_num_rows($talalt)?></p>
                                <tr>
                                    <th>ID</th>
                                    <th>NÉV</th>
                                    <th>cíM</th>
                                    <th>LAT</th>
                                    <th>LNG</th>
                                </tr>
                                <?php 
                                    $lekerd = "SELECT * FROM bars";
                                    
                                    while($bar = $talalt->fetch_assoc()){
                                    
                                ?>
                                <tr>
                                    <td><?=$bar['id']?></td>
                                    <td><?=$bar['name']?></td>
                                    <td><?=$bar['address']?></td>
                                    <td><?=$bar['lat']?></td>
                                    <td><?=$bar['lng']?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
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
    <script>
        function Login() {
            window.location="login.php";
        }
    </script>
</body>
</html>