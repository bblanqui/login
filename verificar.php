    <?php

    $token = $_GET['token'];
    $mysqli = new mysqli("localhost", "root", "", "usuarios2");
    $sentencia=$mysqli->prepare("UPDATE usuario SET pass='$token'  WHERE correo= ?");
    $sentencia->bind_param('s', $correo1);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();




    ?>