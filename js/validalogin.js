var validaFormulario = function() {


}

var validaDNI = function(evento) {
    var valor = evento.target.value;
    // var numero,
    //     let, letra;
    if (!/^[XYZ]?\d{5,8}[A-Z]$/.test(valor)) {
        swal.fire({
            title: "DNI introducido no valido",
            text: "Vuelve a introducir uno correcto",
            icon: "error",
        });
    }
}

window.onload = function() {
    document.getElementById("dni_gestor").onblur = validaDNI;
}