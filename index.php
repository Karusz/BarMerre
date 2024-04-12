<?php
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
            <a href="index.php" class="nav-a hideOnMobile">Kezdőlap</a>
            <button class="btnLogin" onclick="Login()">Bejelentkezés</button>
            <a class="menu-button" onclick="showSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a>
            <div class="sidebar">
                <a onclick="hideSidebar()" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path class="icon-feher" d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a>
                <a href="index.php" class="nav-a active">Kezdőlap</a>
                <button class="btnLogin" onclick="Login()">Bejelentkezés</button>
            </div>
        </nav>
    </header>
    <div class="buborek">


        <main class="flex-shrink-0">
            
            <!-- Features section-->
            <section class="py-5" id="features">

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
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Pár funkció, ami megtalálható</h2></div>
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
                                    <h2 class="h5">Negyedik funkció</h2>
                                    <p class="mb-0">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban;</p>
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
                        
                        <a class="link-light small" href="#!">Feltételek</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="contact.php">Kapcsolat</a>
                    </div>
                </div>
            </div>
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
    
    
    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function Login() {
            window.location="login.php";
        }
    </script>
</body>
</html>