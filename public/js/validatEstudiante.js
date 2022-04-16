expresion = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
function vEmail() {
    vdatemail = document.getElementById("email").value;
    if (!expresion.test(vdatemail)){
        document.getElementById("ms-email").innerHTML = ("Correo electrónico no es un correo válido.");
    }else{
        document.getElementById("ms-email").innerHTML = (" ");
    }
}

caracteres0 = /^\d{7,10}$/
function vFijo() {
    vdatefijo = document.getElementById("telefono_fijo").value;
    if (!caracteres0.test(vdatefijo)){
        document.getElementById("ms-fijo").innerHTML = ("Número de teléfono debe contener de 7 a 10 dígitos.");
    }else{
        document.getElementById("ms-fijo").innerHTML = (" ");
    }
}

caracteres = /^\d{10}$/
function vCelular() {
    vdatecel = document.getElementById("telefono_movil").value;
    if (!caracteres.test(vdatecel)){
        document.getElementById("ms-celular").innerHTML = ("Número celular debe contener 10 dígitos.");
    }else{
        document.getElementById("ms-celular").innerHTML = (" ");
    }
}


contactos = /^\d{10}$/
function vContacto() {
    vdatecont = document.getElementById("telefono_parentesco").value;
    if (!contactos.test(vdatecont)){
        document.getElementById("ms-contacto").innerHTML = ("Ingresar número de celular de 10 dígitos.");
    }else{
        document.getElementById("ms-contacto").innerHTML = (" ");
    }
}
