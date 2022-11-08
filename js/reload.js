$(document).ready(function(){

    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 3000);
});
function refrescar(){

    //Actualiza la página
    var url = window.location.href;
    url = url.split('&')[0];
    window.location.href=url
}