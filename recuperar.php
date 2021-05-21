<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';
$correo1=$_POST['correo1'];
$mysqli = new mysqli("localhost", "root", "", "usuarios2");


if (empty($correo1=$_POST['correo1'])){


    echo json_encode ("llena el campo correo");
}else{
    
   
    
 
    $sentencia=$mysqli->prepare("SELECT * FROM usuario WHERE correo = ?");
    $sentencia->bind_param('s', $correo1);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();

    
    if ($resultado->num_rows < 1){

    
        echo json_encode ("usuario no registrado");

}else{
    


$token = bin2hex(random_bytes(12));        


    $sentencia=$mysqli->prepare("UPDATE usuario SET pass='$token'  WHERE correo= ?");
    $sentencia->bind_param('s', $correo1);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();

















$mail = new PHPMailer(true);

try {
    
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'brallanblanquiceth@gmail.com';                     //SMTP username
    $mail->Password   = 'brian312';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('brallanblanquiceth@gmail.com', 'brallanblanquiceth');
    $mail->addAddress($correo1, ' contraseña  temporal');     //Add a recipient
    

    //Attachments
    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'restablecimiento de contraseña';
    $mail->Body    = 'su contraseña temporal es :'.$token;
    $mail->AltBody = 'Thello';

    $mail->send();




















    echo json_encode ("contraseña temporal enviada a su correo");
} catch (Exception $e) {
    
}






    }

    
}






?>

