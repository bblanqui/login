<?php
$correo=$_POST['correo'];
$pass2=$_POST['pass2'];
$pass3=$_POST['pass3'];
$very=0;
$token = bin2hex(random_bytes(12));
$url="http://localhost/sistema_notas/sistema_notas/index.php?token=$token";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mysqli = new mysqli("localhost", "root", "", "usuarios2");
require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

if (empty($correo=$_POST['correo'])){


    echo json_encode ("llena el campo correo");
}else if(empty($pass2=$_POST['pass2'])){
    
   
    echo json_encode ("llene la contraseña");
    
}else if (empty($pass3=$_POST['pass3'])){

    echo json_encode ("llene la confirmacion de contraseña");

}else if ($pass2 !== $pass3){

    echo json_encode ("contraseñas no coinciden verifique");
}else{



    $sentencia=$mysqli->prepare("SELECT * FROM usuario WHERE correo = ?");
    $sentencia->bind_param('s', $correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();

    
    if ($resultado->num_rows < 1){

  
        $mysqli = new mysqli("localhost", "root", "", "usuarios2");
        $sentencia=$mysqli->prepare("INSERT INTO usuario (correo, pass, very, token) VALUES (?,?,?,?)");
        $sentencia->bind_param('ssis', $correo, $pass2, $very,$token);
        $sentencia->execute();
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
    $mail->addAddress('brallanblanquiceth@gmail.com', ' Welcome ');     //Add a recipient
    

    //Attachments
    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome';

    $cuerpo = '<html>
 </head>
<title>Validacion de cuenta</title>
</head>
<body>
<p>Hola que tal, nos da gusto que nos elijas para trabajar en nuestra empresa. Sin duda esperamos mucho de ti.</p>
<br>
<p>Ya casi acompletas tu registro, solo falta validar tu cuenta. Para ello solo sigue el siguiente enlace.</p>
<br>
 <a href="'.$url.'">Validar cuenta</a>
 <br>
 </body>
</html>';
    $mail->Body =$cuerpo;
    $mail->AltBody = 'Thello';

    $mail->send();
    echo json_encode ("registrado correctamente");
} catch (Exception $e) {
    
}



}else{
                echo json_encode ("usuario ya registrado ");
    }


}





    
















?>