$(document).ready(function(){

    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 3000);
});
function refrescar(){

    //Actualiza la página
    location.reload();
}