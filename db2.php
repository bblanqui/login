<?php

class conexion {

    public $localhost="localhost";
    public $usuario= "root";
    public $pass= ""; 
    public $base="usuarios2";


    public function __construct(){
       

            $mysqli = new mysqli($this->localhost, $this->usuario,$this->pass, $this->base);
          
            if($mysqli->connect_error){
                die("La conexión ha fallado, error número " .$mysqli->connect_errno . ": " .$mysqli->connect_error);
            }else{
           
                echo"conectado";
                return ($mysqli);
            }      
    
            
      

    
    }

   
 
    
    
    }

    
    












?>