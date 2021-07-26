
function setLoginInterfaceClose(){
    
    setTimeout("", 2000)
    document.getElementById('contenedorDivision').innerHTML = "<div class='dropdown-divider'></div><a class='dropdown-item' href='cerrar_sesion'>Cerrar Sesion</a></div>"
}

function setLoginInterfacePass(){
    setTimeout("", 2000)
    document.getElementById('contenedorDivision').innerHTML = "<div class='dropdown-divider'></div><a class='dropdown-item' href='recuperar_contraseña'>Olvidé Mi Contraseña</a></div>"
}

function modalNoLogueado(){
    variable = document.getElementById("modalSesion")
    variable.className = "modalSesionOn";
    
}
function modalLogin(){
    document.getElementById("exampleModalLabel").innerHTML ="INICIAR SESION"
    document.getElementById("texto-modal").innerHTML = "<form action='iniciar_sesion' method='POST'><div class='form-group'><label for='recipient-name' class='col-form-label'>Usuario</label><input type='text' class='form-control' name='usuario'></div><div class='form-group'><label for='message-text' class='col-form-label'>Contraseña</label><input type='password' name='pass'class='form-control'></div></div><div class='d-flex justify-content-end mt-5'> <button  type='button' class='btn btn-secondary me-2' data-bs-dismiss='modal' onclick='modalLoginCierre()'>CERRAR</button><input type='submit' class='btn btn-primary' value='ENTRAR'></form>"
}
function modalLoginCierre(){
    document.getElementById("exampleModalLabel").innerHTML =""
    document.getElementById("texto-modal").innerHTML = ""

}
function modalNoLogueadoCierre(){
    variable = document.getElementById("modalSesion")
    variable.className = "modalSesion";
    
}

function modalLogueado(){
    variable = document.getElementById("modalSesion")
    variable.className = "modalSesionOn";
    
}
function modalLogueadoCierre(){
    variable = document.getElementById("modalSesion")
    variable.className = "modalSesion";
    variable.setAtribute("style", "visibility: hidden; display:none;")
    
}