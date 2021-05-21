<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
    <title>Login animado monster</title>
</head>
<body>
    <div class="login">
        <img src="img/idle/1.png" id="monster" alt="">
        
        <form class="formulario" method="POST">
        <div id="alerta1"></div>
        
                           
         
            <label>Usuario</label>
            <input type="text" id="input-usuario" placeholder="usuario@gmail.com" autocomplete="off" name="usuario"  >
            <label>Contraseña</label>
            <input type="password" id="input-clave" placeholder="*******" name="pass" > 
            <button type="submit" class="btn mt-2 btn-block" name="ingresar">Login</button>
            <p class="mt-2">
               olvido su contraseña <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal1"> aqui</a>
            </p>
            <p class="mt-2">
               no tienes cuenta registrarte <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> aqui</a>
            </p>
            
        </form>
       
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">registrarse</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="formulario2"method="POST">
                      <div id="alerta3"></div>
                        <div class="col">
                       
                           <input type="email" class="form-control" placeholder="correo" name="correo">
                       </div>
                       
                           
                        <div class="col mt-2">
                       
                           <input type="password" class="form-control" placeholder="contraseña"  name="pass2">
                       </div>
                       
                             
                        <div class="col mt-2">
                       
                        <input class="form-control"  type="password"  id="descripcion" placeholder="repita contraseña"  name="pass3"></input>
                       </div>
                       
                           
                       <button  id ="button" type="submit" class="btn mt-2 btn-block" name="registrar">registrar</button>
                        
                        </form>
                </div>
                
              </div>
            </div>
          </div>
      
       
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">recuperar contraseña</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="formulario3"method="POST">
                      <div id="alerta4"></div>
                        <div class="col">
                       
                           <input type="email" class="form-control" placeholder="correo" name="correo1">
                       </div>
                       
                           
                        
                       <button type="submit" class="btn mt-2 btn-block " id ="button1"name="btnrecuperar">enviar</button>
                        
                        </form>
                </div>
                
              </div>
            </div>
          </div>
</body>
<script src="javascript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="ajax.js"></script>





<?php

$very=1;
$token1="";
if (isset($_GET['token'])) {
    $token = $_GET['token'];
     echo "<script> alerta1 = document.querySelector('#alerta1')
        
     alerta1.innerHTML=`<div class='alert alert-success'role='alert'>
     usuario confirmado
   </div>`</script>";
     $mysqli = new mysqli("localhost", "root", "", "usuarios2");
     $sentencia=$mysqli->prepare("SELECT * FROM  usuario  WHERE token= ?");
     $sentencia->bind_param('s', $token);
     $sentencia->execute();
     $resultado = $sentencia->get_result();
     $mysqli->close();
     $sentencia->close();


    
    $mysqli = new mysqli("localhost", "root", "", "usuarios2");
    $sentencia=$mysqli->prepare("UPDATE usuario SET token='$token1', very='$very' where token=?");
    $sentencia->bind_param('s', $token);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $mysqli->close();
    $sentencia->close();

   
   
}



?>


</html>