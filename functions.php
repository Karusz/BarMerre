<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    //$conn = new mysqli("localhost", "root", "", "barmerre");

    function CodeGenerate($length){
        $chars = '1234567890';
        $charsLength = strlen($chars);
        $code = "";
        for($i=0;$i<$length;$i++){
            $code .= $chars[random_int(0, $charsLength-1)];
        }
        return $code;
    }


    function Reg($uname,$email,$password){
        $conn = new mysqli("localhost", "root", "", "barmerre");
        $hash_psw = password_hash($password, PASSWORD_DEFAULT);

        $lekerd = "SELECT * FROM users WHERE email='$email'";
        $talalt = $conn->query($lekerd);
        if(mysqli_num_rows($talalt) == 0){
            $conn->query("INSERT INTO users VALUES(id, '$uname', '$email', '$hash_psw', 0)");
            
            $lekerd = "SELECT * FROM users WHERE email='$email'";
            $talalt = $conn->query($lekerd);
            $user = $talalt->fetch_assoc();
            $_SESSION['userid'] = $user['id'];
            header("Location: profilesettings.php?id=$user[id]");

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

                if(isset($_COOKIE[$user['username']]) && $_COOKIE[$user['username']] != ''){ // Nem eloszor lepett be 
                    header("Location: profilesettings.php?id=".$user['id']);
                    
                }else{ //Eloszor lepett be
                    header("Location: tutorial.php"); //Nyissa meg a tutorialt
                    setcookie($user['username'],$user['username']); // suti letrehozasa
                    

                }
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

    function emailsend($useremail, $linkcode){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username ='barmerre@gmail.com';
        $mail->Password = 'gfnu orzj hflr jlkg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('barmerre@gmail.com');

        $mail->addAddress($useremail);

        $mail->isHTML(true);

        $mail->text = "Új jelszó kérése";
        $mail->Body = "<h1>Az alábbi gombra kattintva tudsz új jleszót beállítani.</h1>
            <a href='localhost/barmerre/reset.php?code=$linkcode&email=$useremail'>Új jelszó </a>";

        $mail->send();

        echo
        "
        <script>
            window.open('login.php');
        </script>
        ";
        
    }
    

?>