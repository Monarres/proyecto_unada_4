
const mensaje_error = (msj) => {
    swal({
        title: "Error!",
        text: msj,
        icon: "warning",
        button: "Aceptar"
    });
}


const mensaje_exito = (msj) => {
    swal({
        title: "Correcto!",
        text: msj,
        icon: "success",
        button: "Aceptar"
    });
}


const validar_campos = () => {
    if ($("#nombre").val().trim() === "" || 
        $("#apellido").val().trim() === "" || 
        $("#usuario").val().trim() === "" || 
        $("#password").val().trim() === "") {
        mensaje_error("Todos los campos deben estar llenos.");
        return false;
    }
    return true;
}


const iniciar_registro = () => {
    
    if (!validar_campos()) return; 

    let data = new FormData();
    data.append("nombre", $("#nombre").val());
    data.append("apellido", $("#apellido").val());
    data.append("usuario", $("#usuario").val());
    data.append("password", $("#password").val());
    data.append("metodo", "iniciar_registro");

    fetch("./app/controller/Registro.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == 1) {
            mensaje_exito(respuesta[1]); 
            setTimeout(() => {
                window.location = "login";
            }, 2000); 
        } else {
            mensaje_error(respuesta[1]); 
        }
    });
}


$("#btn_registro").on('click', () => {
    iniciar_registro();
});
