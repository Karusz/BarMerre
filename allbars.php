<?php
    require "config.php";

    $lekerd = "SELECT * FROM bars";
    $talalt = $conn->query($lekerd);
    
?>
<!DOCTYPE html>
<html lang="hu">
    <style>
        .barsnum{
            text-align: center;
        }
        .pagename{
            margin-top: 100px;
            text-align: center;
        }
        table{
            margin-top: 25px;
            border: 1px solid black;
        }
        th{
            margin: 5px;
            text-align: center;
        }
        td{
            padding: 2px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- ICON LINK -->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <!-- CSS -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/all-style.css">
     

    <title>BarMerre</title>
</head>
<body>
    <div class="wrapper">
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
                                    <th>HELYSZÍN</th>
                                    <th>LAT</th>
                                    <th>LNG</th>
                                    <th>STATE</th>
                                    <th>CITY</th>
                                    <th>ZIP</th>
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
                                    <td><?=$bar['state']?></td>
                                    <td><?=$bar['city']?></td>
                                    <td><?=$bar['zip']?></td>
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