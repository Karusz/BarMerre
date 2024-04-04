<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'phpmailer/src/Exception.php';
require'phpmailer/src/PHPMailer.php';
require'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
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

    $mail->addAddress("modkarcsika@gmail.com");

    $mail->isHTML(true);

    $mail->text = $_POST["subject"];
    $mail->Body = "<a href='localhost/barmerre/index.php?valami=asd'>Valami</a>";

    $mail->send();

    echo
    "
    <script>
    alert('Sent Succesfully');
    </script>
    ";
    
}
?>