
<?php
 

$usuario=$_POST['usuario'];
$pass=$_POST["pass"];
$very=1;
if (empty($usuario=$_POST['usuario'])){


    echo json_encode ("ingresa el campo usuario");
}

else if(empty($pass=$_POST['pass'])){
    
   
    echo json_encode ("llene la contraseña");
     
}else{
      
  
    $mysqli = new mysqli("localhost", "root", "", "usuarios2");
    if($mysqli->connect_error){
        die("La conexión ha fallado, error número " .$mysqli->connect_errno . ": " .$mysqli->connect_error);
    }
    $sentencia=$mysqli->prepare("SELECT * FROM usuario WHERE correo = ? ");
    $sentencia->bind_param('s', $usuario);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();

    
    if ($resultado->num_rows < 1){

        echo json_encode ("usuario no registrado");
    }else{
            
        $mysqli = new mysqli("localhost", "root", "", "usuarios2");
    if($mysqli->connect_error){
        die("La conexión ha fallado, error número " .$mysqli->connect_errno . ": " .$mysqli->connect_error);
    }
    $sentencia=$mysqli->prepare("SELECT * FROM usuario WHERE pass = ? ");
    $sentencia->bind_param('s', $pass);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();


    if ($resultado->num_rows < 1){

        echo json_encode ("contraseña incorrecta");
    }else{

        $mysqli = new mysqli("localhost", "root", "", "usuarios2");
        $sentencia=$mysqli->prepare("SELECT correo FROM usuario WHERE correo = ? and very = ? ");
        $sentencia->bind_param('si', $usuario, $very);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $mysqli->close();
        $sentencia->close();
        
        if ($resultado->num_rows < 1){
            echo json_encode ("usuario no verificado (confirme su email)");
            
        }else{
            echo json_encode ("logeo ok");
            
            
        }
        

    }



    }
    
    
    
   

    

}

//////////////////////////////////FETCH2///





?>