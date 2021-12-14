var formulario = document.getElementById('formulario'),
    nombre = formulario.nombre,
    apellido = formulario.apellido,
    tipodoc = formulario.tipodoc,
    numerodoc = formulario.numerodoc,
    correo = formulario.correo,
    telefono = formulario.telefono,
    cargo = formulario.cargo,
    error = document.getElementById('error');

function validarNombre(e) {
    if (nombre.value == '' || nombre.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el nombre </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarApellido(e) {
    if (apellido.value == '' || apellido.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el apellido </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }
}

function validarTipodoc(e) {
    if (tipodoc.value == 0 || tipodoc.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor seleccione el tipo de documento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarNumerodoc(e) {
    if (numerodoc.value == '' || numerodoc.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el numero de documento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarCorreo(e) {
    if (correo.value == '' || correo.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el correo </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarTelefono(e) {
    if (telefono.value == '' || telefono.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el telefono </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarCargo(e) {
    if (cargo.value == 0 || cargo.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor seleccione el cargo </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

//Funcion encargada de validar todos los campos

function validarForm(e) {

    //reiniciamos el error para que inicie sin mensaje
    error.innerHTML = '';

    validarNombre(e);
    validarApellido(e);
    validarTipodoc(e);
    validarNumerodoc(e);
    validarCorreo(e);
    validarTelefono(e);
    validarCargo(e);
}

formulario.addEventListener('submit', validarForm);