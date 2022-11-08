var validaFormulario = function() {


}
var validaEmail = function(evento) {
    var valor = evento.target.value
    if (!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor))) {
        swal({
            title: "Has puesto un correo no valido",
            text: "Vuelve a introducir los datos",
            icon: "error",
        });
        return false;
    } else {
        document.getElementById(evento.target.id + "_msg").innerHTML = "";
        evento.target.style.borderColor = "black";
        evento.target.style.borderWidth = "1px";
        return true;
    }

}
var validaContra = function(evento) {
    //     console.log("hola")
    var valor = evento.target.value;
    if (valor == null || valor.length == 0) {
        //         console.log("hola2")
        //document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no puede estar vacio";
        //         evento.target.style.borderColor = "red";
        //         evento.target.style.borderWidth = "5px";
        //         evento.target.focus();
        swal({
            title: "La contraseña no puede estar vacia",
            text: "Vuelve a introducir los datos",
            icon: "error",
        });
        //         document.getElementById('saveForm').addAttribute("disabled");
        //         return false;
    } else {
        //         document.getElementById(evento.target.id + "_msg").innerHTML = "";
        //         evento.target.style.borderColor = "black";
        //         evento.target.style.borderWidth = "1px";
        //         document.getElementById('saveForm').removeAttribute("disabled");
        //         return true;
    }
}

var validaVacio = function(evento) {
    //     console.log("hola")
    var valor = evento.target.value;
    if (valor == null || valor.length == 0) {
        //         console.log("hola2")
        //document.getElementById(evento.target.id + "_msg").innerHTML = evento.target.name + " no puede estar vacio";
        //         evento.target.style.borderColor = "red";
        //         evento.target.style.borderWidth = "5px";
        //         evento.target.focus();
        swal({
            title: "No puedes dejar un campo vacio.",
            text: "Rellena los campos vacios",
            icon: "error",
        });
        //         document.getElementById('saveForm').addAttribute("disabled");
        //         return false;
    } else {
        //         document.getElementById(evento.target.id + "_msg").innerHTML = "";
        //         evento.target.style.borderColor = "black";
        //         evento.target.style.borderWidth = "1px";
        //         document.getElementById('saveForm').removeAttribute("disabled");
        //         return true;
    }
}

var validaTelf = function(evento) {
    var valor = evento.target.value;
    if (!(/^([0-9]+){9}$/.test(valor))) {
        swal({
            title: "Procura que el telefono esta bien escrito",
            text: "9 numeros y sin espacios",
            icon: "error",
        });
    }
}

var validaDNI = function(evento) {
    var valor = evento.target.value;
    // var numero,
    //     let, letra;
    if (!/^[XYZ]?\d{5,8}[A-Z]$/.test(valor)) {
        swal({
            title: "DNI introducido no val  ido",
            text: "Vuelve a introducir uno correcto",
            icon: "error",
        });
    }
}

var eliminaPop = function(evento) {
    var valor = evento.target.value;
    if (valor.onclick == true) {
        swal({
            title: "Estas seguro?",
            text: "Quieres borrar a este usuario?.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        });
    } else {}
}

var borrarPop = function evento() {
    Swal.fire({
        titleText: "Estas seguro que quieres salir? ",
        text: "Si dices que si tendras que volver a iniciar sesión.",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, salir',
        cancelButtonText: 'No estoy seguro'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './vista.php';
        }
    })
}

// if(expresion_regular_dni.test(dni) === true){
//     numero = dni.substr(0,dni.length-1);
//     numero = numero.replace('X', 0);
//     numero = numero.replace('Y', 1);
//     numero = numero.replace('Z', 2);
//     let = dni.substr(dni.length-1, 1);
//     numero = numero % 23;
//     letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
//     letra = letra.substring(numero, numero+1);
//     if (letra != let) {
//         //alert('Dni erroneo, la letra del NIF no se corresponde');
//         return false;
//     }else{
//         //alert('Dni correcto');
//         return true;
//     }
// }else{
//     //alert('Dni erroneo, formato no válido');
//     return false;
// }

var validaNota = function(evento) {
    var valor = evento.target.value;
    if (!/^\d*\.?\d*$/.test(valor)) {
        swal({
            title: "Numero incorrecto",
            text: "Introduce un numero entero o decimal",
            icon: "error",
        });
    }
}
window.onload = function() {
    document.getElementById("element_3").onblur = validaEmail;
    document.getElementById("element_4").onblur = validaContra;
    document.getElementById("element_1").onblur = validaVacio;
    document.getElementById("element_2.1").onblur = validaVacio;
    document.getElementById("element_2.2").onblur = validaVacio;
    document.getElementById("element_6").onblur = validaTelf;
    document.getElementById("element_5").onblur = validaDNI;
    document.getElementById("delete").onclick = borrarPop;
}