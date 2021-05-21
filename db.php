<?php 
//clase base de datos
$correo="addeaqwaaaw@gmail.com";
$pass2="12212";
$very=0;
$mysqli = new mysqli("localhost", "root", "", "usuarios2");
$sentencia=$mysqli->prepare("SELECT correo FROM usuario WHERE correo = ? and very = ? ");
$sentencia->bind_param('si', $correo, $very);
$sentencia->execute();
$resultado = $sentencia->get_result();
$mysqli->close();
$sentencia->close();

if ($resultado->num_rows < 1){
    
    echo ("verificado");
}else{
    echo "usuario no verificado ";
    
}

    
?>