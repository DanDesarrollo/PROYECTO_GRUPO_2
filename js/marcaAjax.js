function registrarRol() {

    let form = $("#formRol");

    let obj = {

        url: 'insertarRol.php',
        method: 'POST',
        data: form.serialize()
    };

    $.ajax(obj)
        .done((resp) => {
            $("#divmensaje").html('¡Registro Exitoso!');
            $("#divmensaje").css({
                background: '#BCD8A3'
            })
            if (registrarRol) {
                window.location.replace("../rol/Rol.php");
            }
        })
        .fail(() => {
            alert("Ocurrio un error");
        })
}