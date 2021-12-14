var formulario = document.getElementById('formulario'),
    elemento = formulario.nombre,
    cantidad = formulario.cantidad,
    serial = formulario.serial,
    fecha = formulario.fecharegistro,
    observacion = formulario.observacion,
    descripcion = formulario.descripcion,
    modelo = formulario.modelo,
    tipo_elemento = formulario.tipo_elemento,
    marca = formulario.marca
    error = document.getElementById('error');

function validarElemento(e) {
    if (nombre.value == '' || nombre.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el nombre del elemento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarCantidad(e) {
    if (cantidad.value == '' || cantidad.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite la cantidad </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }
}

function validarSerial(e) {
    if (serial.value == 0 || serial.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor seleccione el serial del elemento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarFecha(e) {
    if (fecharegistro.value == '' || fecharegistro.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite la fecha </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarObservacion(e) {
    if (observacion.value == '' || observacion.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor escriba las observaciones pertinentes </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarDescripcion(e) {
    if (descripcion.value == 0 || descripcion.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor de una descripcion </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarModelo(e) {
    if (modelo.value == '' || modelo.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor digite el modelo del elemento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarTipoelemento(e) {
    if (tipo_elemento.value == 0 || tipo_elemento.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor seleccione el tipo de elemento</li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}

function validarMarca(e) {
    if (marca.value == 0 || marca.value == null) {
        error.style.display = 'block';
        error.innerHTML += '<li> \&#9888; Por favor seleccione la marca del elemento </li>';

        e.preventDefault();
    } else {
        error.style.display = 'none';
    }

}



//Funcion encargada de validar todos los campos

function validarForm(e) {

    //reiniciamos el error para que inicie sin mensaje
    error.innerHTML = '';

    validarElemento(e);
    validarCantidad(e);
    validarSerial(e);
    validarFecha(e);
    validarObservacion(e);
    validarDescripcion(e);
    validarModelo(e);
    validarTipoelemento(e);
    validarMarca(e);
}

formulario.addEventListener('submit', validarForm);