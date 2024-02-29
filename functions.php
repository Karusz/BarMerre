<?php
    session_start();

    //$conn = new mysqli("localhost", "root", "", "barmerre");
    function Regist($uname,$email,$password){
        $conn = new mysqli("localhost", "root", "", "barmerre");
        $hash_psw = password_hash($password, PASSWORD_DEFAULT);

        $lekerd = "SELECT * FROM users WHERE email='$email'";
        $talalt = $conn->query($lekerd);
        if(mysqli_num_rows($talalt) == 0){
            $conn->query("INSERT INTO users VALUES(id, '$uname', '$email', '$hash_psw', 0)");
            header("Location: account.php");
        }else{
            echo "<script>alert('Már regisztráltál ezzel az email címmel!')</script>";
        }
    }

    function Login($email,$password,$remember){
        $conn = new mysqli("localhost", "root", "", "barmerre");

        $lekerd = "SELECT * FROM users WHERE email = '$email'";
        $talalt = $conn->query($lekerd);

        if(mysqli_num_rows($talalt) == 1){
            $user = $talalt->fetch_assoc();
            if(password_verify($password, $user['password'])){
                
                $_SESSION['userid'] = $user['id'];
                header("Location: tutorial.html");
    
            }else{
                echo '<script>alert("Nem jó az email cím vagy a jelszó!")</script>';
            }
        }else{
            echo '<script>alert("Nem jó az email cím vagy a jelszó!")</script>';
        }
    }

    function Remember($email, $password){
        $hour = time() + 3600 * 24 * 30;
        setcookie('email', $email, $hour);
        setcookie('password', $password, $hour);
    }
?>