<?php
    session_start();
    
    echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Menü 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menü 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Menü 3</a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">'.$_SESSION['useranme'].'</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>';


?>