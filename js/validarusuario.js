var formulario = document.getElementById('formulario'),

    nombre = formulario.nombre,
    apellido = formulario.apellido,
    tipodoc = formulario.tipodoc,
    numerodoc = formulario.numerodoc,
    rol = formulario.rol,
    estado = formulario.estado
    correo = formulario.correo,
    telefono = formulario.telefono,
    clave = formulario.clave,
    error = document.getElementById('error');

function validarNombre(e) {
    if (nombre.value == '' || nombre.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el nombre </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarApellido(e) {
    if (apellido.value == '' || apellido.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el apellido </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }
}

function validarTipodoc(e) {
    if (tipodoc.value == 0 || tipodoc.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor seleccione el tipo de documento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarNumerodoc(e) {
    if (numerodoc.value == '' || numerodoc.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el numero de documento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarRol(e) {
    if (rol.value == '' || rol.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el rol </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }
}

function validarEstado(e) {
    if (estado.value == '' || estado.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el estado </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }
} 

function validarCorreo(e) {
    if (correo.value == '' || correo.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el correo </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarTelefono(e) {
    if (telefono.value == '' || telefono.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor digite el telefono </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarClave(e) {
    if (clave.value == 0 || clave.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> ⚠ Por favor seleccione la contraseña </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

//Funcion encargada de validar todos los campos

function validarForm(e) {

    //reiniciamos el error para que inicie sin mensaje
    error.innerHTML = '';

    validarNombre(e)
    validarApellido(e)
    validarTipodoc(e)
    validarNumerodoc(e)
    validarRol(e)
    validarEstado(e) 
    validarCorreo(e)
    validarTelefono(e)
    validarClave(e)
}

formulario.addEventListener('submit', validarForm);