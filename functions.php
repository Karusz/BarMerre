<?php
    //$conn = new mysqli("localhost", "root", "", "barmerrenew");

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
        //hash code ellenorzese
            //Jo:
                //bejelentkezes
            //rosz
                //figyelmeztetes
    }


?>