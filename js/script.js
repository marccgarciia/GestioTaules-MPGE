function clickMe2(id, estado, sala) {

    var array = document.getElementsByName('js-open-modal');

    for (let i = 0; i < array.length; i++) {

        array[i].addEventListener("click", function(e) {
            let modal = document.querySelector('.modal');
            modal.classList.add('modal--show');
        })
    }
    document.getElementById('js-close-modal').addEventListener("click", function(e) {
        e.preventDefault();
        modal.classList.remove('modal--show');
    })

    document.getElementById('form').addEventListener("submit", function(e) {

        var comen = document.getElementById('comensales').value
        var cambio = 'si';

        var url = "../view/mostrarMesas.php?sala=" + sala + "&est=" + estado + "&id=" + id + "&camb=" + cambio + "&comen=" + comen;

        document.getElementById('form').action = url


    })


}

function modalIncidencia() {
    var array = document.getElementById('js2-open-modal');
    array.addEventListener("click", function(e) {
        let modal = document.querySelector('.modal2');
        modal.classList.add('modal2--show');

    })
    document.getElementById('close-modal').addEventListener("click", function(e) {
        e.preventDefault();
        modal.classList.remove('modal2--show');
    })
    document.getElementById('form2').addEventListener("submit", function(e) {

        var mesa = document.getElementById('nummesa').value
        var descripcion = document.getElementById('desc').value

        var url = "../proc/crearincidencia.php?mesa=" + mesa + "&descripcion=" + descripcion;

        document.getElementById('form2').action = url


    })

}



function clickMe(id, estado, sala) {


    var comen = 0
    var cambio = 'si';
    var url = '../view/mostrarMesas.php?sala=' + sala + '&est=' + estado + '&id=' + id + '&camb=' + cambio + '&comen=' + comen;
    window.location.href = url

}



function borrar(url) {
    Swal.fire({
        title: 'Estas seguro que la incidencia esta solucionada?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
    }).then((result) => {
        if (result.isConfirmed) {

            window.location.href = url

        }
    })
}