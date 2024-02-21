<?php
    session_start();
    
    echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Kezdolap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="terkep.html">Terkep</a>
                </li>';
                if($_SESSION['is_admin'] == 1){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="adminpage/admin.html">Admin</a>
                        </li>
                        </ul>
                        </div>
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="profile.php">'.$_SESSION['username'].'</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </nav>';
                }else{
                    echo '</ul>
                    </div>
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">'.$_SESSION['username'].'</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </nav>';
                }
            


?>