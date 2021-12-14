var nombre = document.getElementById('nombre');
var clave = document.getElementById('clave');
var error = document.getElementById('error');
var categoria = document.getElementById('categoria');
error.style.color = 'red';

function enviarFormulario(){
    console.log("Enviando Datos...");

    //Se crea un arreglo dentro de la funcion para almacenar los mensajes de error al validar el formulario
    var mensajeError = [];
    
    if(nombre.value === null || nombre.value === ''){
        mensajeError.push('⚠ Ingresa el nombre');
        error.innerHTML = mensajeError.join(', ');
        return false;
    }

    if(clave.value === null || clave.value === ''){
        mensajeError.push('⚠ Ingresa tu clave');
        error.innerHTML = mensajeError.join(', ');
        return false;
    }

    

    return true;

    /* return false; */
}

/* var form = document.getElementById('formulario');
    form.addEventListener('submit', function(evt){
        evt.preventDefault();
    }); */