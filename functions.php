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

        $code_lekerd = "SELECT * FROM forgotlogins WHERE user_email = '$email' AND is_active = 1";
        $code_talalt = $conn->query($code_lekerd);

        if(mysqli_num_rows($talalt) == 1){
            $user = $talalt->fetch_assoc();
            if(password_verify($password, $user['password'])){
                
                $_SESSION['userid'] = $user['id'];
                header("Location: allroutes.php");
                    
                
            }else if(mysqli_num_rows($code_talalt) == 1){
                $code_user = $code_talalt->fetch_assoc();
                if($password == $code_user['code']){

                    $_SESSION['userid'] = $user['id'];
                    header("Location: profilesettings.php?id=".$user['id']);
                    $conn->query("UPDATE forgotlogins SET is_active=0 WHERE code= '$code_user[code]'");

                }

            }else{
                echo '<script>alert("Nem jó az email cím vagy a jelszó!")</script>';
                header("Refresh:0");
            }
        }else{
            echo '<script>alert("Nem jó az email cím vagy a jelszó!")</script>';
            header("Refresh:0");
        }
    }


    function Remember($email, $password){
        $hour = time() + 3600 * 24 * 30;
        setcookie('email', $email, $hour);
        setcookie('password', $password, $hour);
    }

    function emailsend($useremail, $text, $body){
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

        $mail->Subject = $text;
        $mail->Body = $body;

        $mail->send();

        echo
        "
        <script>
            window.open('login.php');
        </script>
        ";
        
    }
?>