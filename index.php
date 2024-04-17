<?php
    require "config.php";
    session_start();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BarMerre</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all-style.css">
    <link rel="stylesheet" href="assets/css/nav-style.css">
</head>
<body class="d-flex flex-column h-100">
    
    <?php
    
        if(empty($_SESSION['userid'])){

    ?>
        <header class="nav">
            <!-- MODAL START -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ez egy felnőtt oldal.</h5>
                        </div>
                        <div class="modal-body">
                            <p>Mivel az alkohol fogyasztás 18. éven aluliaknak nem ajánlott, ezért a megtekintéséhez be kell töltened a 18. életévedet.</p>
                            <p>Betöltötted már a 18. életévedet?</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Igen</button>
                            <a href="https://www.minimax.hu"><button type="button" class="btn btn-primary">Nem</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  MODAL END-->
            <a href="index.php" class="logo mx-2 px-2"><h2>BarMerre</h2></a>
            <nav class="navigation">
                <a href="index.php" class="nav-a hideOnMobile">Kezdőlap</a>
                <button class="btnLogin hideOnMobile" onclick="Login()">Bejelentkezés</button>
                <a class="menu-button px-5" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
                <div class="sidebar">
                    <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
                    <a href="index.php" class="sidebar-nav-a">Kezdőlap</a>
                    <button class="btnLogin" onclick="Login()">Bejelentkezés</button>
                </div>
            </nav>
        </header>
    <?php
        }else{
            $lekerd = "SELECT * FROM users WHERE id=$_SESSION[userid]";
            $talalt = $conn->query($lekerd);
            $user = $talalt->fetch_assoc();
    ?>
        <header  class="nav">
            <!-- MODAL START -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Ez egy felnőtt oldal.</h5>
                        </div>
                        <div class="modal-body">
                            <p>Mivel az alkohol fogyasztás 18. éven aluliaknak nem ajánlott, ezért a megtekintéséhez be kell töltened a 18. életévedet.</p>
                            <p>Betöltötted már a 18. életévedet?</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Igen</button>
                            <a href="https://www.minimax.hu"><button type="button" class="btn btn-primary">Nem</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--  MODAL END-->
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
    <?php } ?>
    <div class="buborek">


        <main class="flex-shrink-0">
            
            <!-- Features section-->
            <section class="py-1" id="features">

                <!-- Header-->
            <div class="bg-dark py-5 mt-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">BarMerre</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Kocsmatúra karnyújtásnyira: Fedezd fel a város legjobb kocsmáit könnyedén és szórakozva!</p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="assets/img/logo/testlogo.png" alt="..." /></div>
                    </div>
                </div>
            </div>
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Válogass a támogatott kocsmáink közül és hozd létre a kedvenc kocsmatúra útvonaladat!</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                    <h2 class="h5">Meglévő útvonalak használata</h2>
                                    <p class="mb-0">Böngészd át a már - általunk vagy közösségünk által - előre létrehozott útvonalakat és válaszd ki a számodra legideálisabbat.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                    <h2 class="h5">Útvonal tervezés</h2>
                                    <p class="mb-0">Nézd át a kocsmák listáját, add hozzá az utadhoz őket, majd mi megtervezzük a legoptimálisabb útvonalat neked. </p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Kocsmák és útvonalak értékelése</h2>
                                    <p class="mb-0">Értékeld a listában szereplő kocsmáinkat és útvonalainkat, hogy ezzel segíts másokat a választásban.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Kommentelj az útvonalakhoz</h2>
                                    <p class="mb-0">Írd le a gondolataidat a különböző útvonalaknál.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-2 my-2">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">A 3 kedvenc kocsmánk</h2>
                                <p class="lead fw-normal text-muted mb-5">Ha szeretnél egy biztos pontot a kocsmatúrádban, akkor az alábbi 3 kocsma egyikét minden féle képpen add hozzá az útvonaladhoz.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0 bg-dark text-white-50">
                                <img class="card-img-top" src="assets/img/inyenc.png" alt="Ínyenc Zenés Bisztro" />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-light stretched-link" href="https://www.facebook.com/zenesbisztro.inyenc/?locale=hu_HU" target="_blank"><h5 class="card-title mb-3">Ínyenc Zenés Bisztro</h5></a>
                                    <p class="card-text mb-0">
                                    A Szentendrei Ínyenc Zenés Bisztró egy varázslatos hely, ahol az ízletes kulináris élmények és a kellemes zene összetalálkoznak. A hangulatos környezetben élvezheted a frissen készített gourmet ételeket és italokat. A bisztró rendszeresen vendégül lát helyi zenészeket, akik különleges atmoszférát teremtenek az esti programok során. Ez a hely tökéletes választás egy romantikus vacsorához vagy egy baráti összejövetelhez Szentendrén.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0 bg-dark text-white-50">
                                <img class="card-img-top" src="assets/img/szimplakert.png" alt="Szimpla Kert" />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-light stretched-link" href="https://szimpla.hu/info.html" target="_blank"><h5 class="card-title mb-3">Szimpla Kert</h5></a>
                                    <p class="card-text mb-0">Budapest leghíresebb bárja valójában közelebb volt egy lerobbant épülethez. A 2000-es évek elején néhány fiatal magyar egy elhagyatott épületben nyitott bárt a Zsidó Negyedben - és ez indította el a „romkocsma” trendet. Ma a Szimpla Kert egy lakóházat foglal el, amelyet egészen a tégláig lecsupaszítottak. A helyet helyi művészetekkel, graffiti-vel, lámpafüzérekkel és vegyes vintage bútorokkal díszítették fel. A italokat akár egy régi Trabantban is fogyaszthatod. Az alsó és felső szinten is több bár található, de ha hétvégén érkezel, számíts a tömegre.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0 bg-dark text-white-50">
                                <img class="card-img-top" src="assets/img/4-6-sorozo.png" alt=">4-es 6-os Söröző" />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-light stretched-link" href="https://www.legjobbkocsma.hu" target="_blank"><h5 class="card-title mb-3">4-es 6-os Söröző</h5></a>
                                    <p class="card-text mb-0">A Budapesti 4-es 6-os söröző egy igazi kultikus helyszín a városban. A neve a közelben közlekedő 4-es és 6-os villamosvonalakra utal, ami megkönnyíti a megközelítést. Az egyedi atmoszférával és barátságos kiszolgálással rendelkező söröző ideális választás a sörkedvelők számára. A helyszín széles választékot kínál a legkülönfélébb helyi és nemzetközi sörök közül, lehetőséget adva a kóstolásra és felfedezésre egyaránt. A hangulatos enteriőr és a kényelmes ülések tökéletes hátteret biztosítanak egy hosszabb beszélgetéshez vagy egy egyszerűbb találkozóhoz barátokkal. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; BarMerre 2024</div></div>
                    <div class="col-auto">
                        
                        <a class="link-light small" id="felteltElement" href="#" data-bs-toggle="modal" data-bs-target="#feltelt">Felhasználási Feltételek</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" id="felteltElement" href="#" data-bs-toggle="modal" data-bs-target="#adatv">Adatvédelmi Nyilatkozat</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="contact.php">Kapcsolat</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Adatvédelmi Nyilatkozat -->
        <div class="modal fade m-5" id="adatv" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Adatvédelmi Nyilatkozat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Adatvédelmi Nyilatkozat</h4>
                        
                        <p>1. Személyes Adatok Gyűjtése és Kezelése</p>
                        <ul>
                            <li>A weboldal regisztrációhoz kötött szolgáltatást nyújt, mely során az alábbi személyes adatokat gyűjtjük: e-mail cím és az Ön 18. életévét betöltötte-e.</li>
                            <li>Az Ön által megadott személyes adatokat bizalmasan kezeljük, és semmilyen körülmények között nem adjuk ki harmadik félnek.</li>
                        </ul>

                        <p>2. Adatkezelési Cél</p>
                        <ul>
                            <li>Az Ön által megadott adatokat kizárólag a weboldal szolgáltatásainak nyújtásához és kommunikációhoz használjuk.</li>
                            <li>Az e-mail címet a weboldal által küldött értesítések, információk és promóciós anyagok továbbítására használjuk.</li>
                        </ul>
                        <p>3. Adatbiztonság</p>
                        <ul>
                            <li>Az adatvédelmi szabályzataink és technikai intézkedéseink biztosítják az adatok biztonságos kezelését és védelmét.</li>
                            <li>Minden szükséges intézkedést megtesszük az adatok jogosulatlan hozzáférés, módosítás vagy illetéktelen megosztás megelőzése érdekében.</li>
                        </ul>
                        <p>4. Harmadik Fél Szolgáltatásai</p>
                        <ul>
                            <li>A weboldal nem felelős harmadik fél által üzemeltetett vagy ellenőrzött weboldalak adatvédelmi gyakorlatáért.</li>
                            <li>Kérjük, ellenőrizze ezeknek a weboldalaknak az adatvédelmi irányelveit, mielőtt személyes adatokat megosztana velük.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Felhasználási Feltételek -->
        <div class="modal fade" id="feltelt" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Felhasználási Feltételek</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Regisztráció és Adatkezelés</h4>

                        <p>1. A weboldal regisztrációhoz kötött szolgáltatást nyújt. A regisztráció során az alábbi adatokat kell megadnia: e-mail cím, és az Ön 18. életévét betöltötte-e.</p>

                        <p>2. Az Ön által megadott személyes adatokat bizalmasan kezeljük, és semmilyen körülmények között nem adjuk ki harmadik félnek.</p>

                        <p>3. Az e-mail címet kizárólag a weboldal szolgáltatásainak nyújtásához és kommunikációhoz használjuk.</p>

                        <p>4. Az adatvédelmi irányelveink és adatkezelési szabályaink részletesen megtalálhatók az Adatvédelmi Nyilatkozatunkban.</p>

                        <p>5. Kérjük, hogy a regisztráció során valós és pontos adatokat adjon meg, és gondoskodjon azok naprakészen tartásáról.</p>
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
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>