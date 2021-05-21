let formulario = document.querySelector(".formulario");










formulario.addEventListener('submit',(e)=>{

e.preventDefault();

let datos = new FormData(formulario);


fetch ("resibe.php",{

    method:'POST',
    body:datos

}).then((res)=> {

  if (res.ok == true){
    return res.json()

  }else{

    return  Promise.reject(res)
  }
  



}).then(data =>{

    

    if (data === "ingresa el campo usuario"){

        alerta1 = document.querySelector("#alerta1")
        
        alerta1.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`

    }else if(data === "llene la contraseña"){
        alerta1 = document.querySelector("#alerta1")
        
        alerta1.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`

    }else if(data ==="usuario no registrado"){

        alerta1 = document.querySelector("#alerta1")
        
        alerta1.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}

        
      </div>`
      
    }else if(data ==="contraseña incorrecta"){

        alerta1 = document.querySelector("#alerta1")
        
        alerta1.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}

        
      </div>`
     
    
    }else if(data ==="usuario no verificado (confirme su email)"){


      alerta1 = document.querySelector("#alerta1")
        
      alerta1.innerHTML=`<div class="alert alert-danger" role="alert">
      ${data}

      
    </div>`
    


    }else{

      alerta1 = document.querySelector("#alerta1")
        
      alerta1.innerHTML=`<div class="alert alert-success" role="alert">
      ${data}

      
    </div>`
    setTimeout(()=>{

      window.location.href="sistema.php";

     },2000)



    }
}).catch((err) =>{

  console.log("error", err)

})


})





//////////////////////////////////////////////////////fetch2////////////////

let formulario2 = document.querySelector("#formulario2");

formulario2.addEventListener('submit',(e)=>{

  e.preventDefault();
  let datos = new FormData(formulario2);

  fetch ("registrar.php",{

    method:'POST',
    body:datos
  
  }).then((res)=> {
  
  if (res.ok == true){
    return res.json()
  
  }else{
  
    return  Promise.reject(res)
  }
  
  
  
  
  }).then(data =>{
  
    
  
    if (data === "llena el campo correo"){
  
        alerta3 = document.querySelector("#alerta3")
        
        alerta3.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`
  
    }else if(data === "llene la contraseña"){
        alerta3 = document.querySelector("#alerta3")
        
        alerta3.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`
  
    }else if(data === "llene la confirmacion de contraseña"){

      alerta3 = document.querySelector("#alerta3")
        
      alerta3.innerHTML=`<div class="alert alert-danger" role="alert">
      ${data}
    </div>`

    }else if (data === "contraseñas no coinciden verifique"){

      alerta3 = document.querySelector("#alerta3")
        
      alerta3.innerHTML=`<div class="alert alert-danger" role="alert">
      ${data}
    </div>`

  
    

    }else if (data === "registrado correctamente") {
    


      alerta3 = document.querySelector("#alerta3")
        
      alerta3.innerHTML=`<div class="alert alert-success" role="alert">
      ${data}, confirme email para continuar.
    </div>`
   
   
    }else{

      alerta3 = document.querySelector("#alerta3")
        
      alerta3.innerHTML=`<div class="alert alert-danger" role="alert">
      ${data}
    </div>`
   

    }
  }).catch((err) =>{
  
  console.log("error", err)
  
  })
  

})


//////////////////////fetch 3//////


let formulario3 = document.querySelector("#formulario3");

formulario3.addEventListener('submit',(e)=>{

  e.preventDefault();
  let datos3 = new FormData(formulario3);

  fetch ("recuperar.php",{

    method:'POST',
    body:datos3
  
  }).then((res)=> {
  
  if (res.ok == true){
    return res.json()
  
  }else{
  
    return  Promise.reject(res)
  }
  
  
  
  
  }).then(data =>{
  
    
  
    if (data === "llena el campo correo"){
  
        alerta4 = document.querySelector("#alerta4")
        
        alerta4.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`
  
    }else if (data === "usuario no registrado"){
        alerta4 = document.querySelector("#alerta4")
        
        alerta4.innerHTML=`<div class="alert alert-danger" role="alert">
        ${data}
      </div>`
      
    }else{

      alerta4 = document.querySelector("#alerta4")
        
      alerta4.innerHTML=`<div class="alert alert-success" role="alert">
      ${data}
    </div>`

    }
  
  }).catch((err) =>{
  
    console.log("error", err)
  })

})



////fetch4


