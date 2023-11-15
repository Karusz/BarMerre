<?php
    //$conn = new mysqli("localhost", "root", "", "barmerrenew");
    session_start();

    function Reg($username,$passwordhash,$email){
        $conn = new mysqli("localhost", "root", "", "barmerrenew");

        //Van-e ilyen felhasznalo?
        $lekerd = "SELECT * FROM users WHERE username='$username'";
        $talalt = $conn->query($lekerd);
        if(mysqli_num_rows($talalt) == 0){

            $conn->query("INSERT INTO users VALUES(id,'$username','$passwordhash','$email',0,0)");
            header("Location: login.php");
            
        }else{
            echo '<script>alert("Foglalt felhasznalonev!")</script>';
        }
    }

    function Login($username,$password){
        $conn = new mysqli("localhost", "root", "", "barmerrenew");
        $lekerd = "SELECT * FROM users WHERE username='$username'";
        $talalt = $conn->query($lekerd);
        $fh = $talalt->fetch_assoc();
        if(true){
            
            $hash = $fh['passhash'];
            if(password_verify($password, $hash)){
                
                $_SESSION['useranme'] = $fh['username'];
                header("Location: users/userpages/profile.html");
            }else{
                echo '<script>alert("Nem jó a felhasznaló vagy a jelszó!")</script>'; 
            }
        }else{
            echo '<script>alert("Nem jó a felhasznaló vagy a jelszó!")</script>';
        }
    }


?>