var validaFormulario = function() {


}

var validaNums = function(evento) {
    var valor = evento.target.value;
    if (!/^\d{1,2}?$/.test(valor)) {
        swal.fire({
            title: "Filtro incorrecto",
            text: "Introduce solo 1 o 2 numeros en los campos de filtro",
            icon: "error",
        });
    }
}

window.onload = function() {
    document.getElementById("filtro_camareros").onblur = validaNums;
    document.getElementById("filtro_mesas").onblur = validaNums;
}