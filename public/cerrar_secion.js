

const cerrar_secion = ()=>{

    fetch("./app/controller/cerrar_secion.php")
    .then(respuesta=>respuesta.json())
    .then(respuesta=>{
        
        alert(respuesta[1]);
        window.location="login.php";
    });

}
$("#btn_cerrar").on('click',()=>{
    cerrar_secion();
})
 
