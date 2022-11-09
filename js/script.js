<<<<<<< HEAD
function clickMe(id, estado, sala) {

    var array= document.getElementsByName('js-open-modal');
    console.log(array)
    for (let i=0; i<array.length; i++) {

        array[i].addEventListener("click" , function (e){
            let modal= document.querySelector('.modal');
            modal.classList.add('modal--show');
        })
    }
    document.getElementById('js-close-modal').addEventListener("click" , function (e){
        e.preventDefault();
        modal.classList.remove('modal--show');
    })
=======
window.onload = (event) => {
    var array = document.getElementsByName('js-open-modal');
    console.log(array)
    for (const i in array) {
        console.log(array[i])
        array[i].addEventListener("click", function(eve) {
            document.getElementById('modal').classList.add('visible')
        }, false);
    }
    console.log(document.getElementsByClassName('js-close-modal'))
>>>>>>> 4d02de5a15de7838b32122c61b6d2462543ba424

    document.getElementById('submit').addEventListener("submit" , function (e){
        var comen = document.getElementById('comensales').value
        var cambio ='si';
        document.getElementById("form").action = '../view/mostrarMesas.php?sala='+sala + '&est='+estado + '&id=' +id+'&camb='+ cambio+'&comen='+comen;
    })


}

<<<<<<< HEAD
=======
function clickMe(id, estado, sala) {
    var cambio = 'si';
    window.location.href = '../view/mostrarMesas.php?sala=' + sala + '&est=' + estado + '&id=' + id + '&camb=' + cambio
}
>>>>>>> 4d02de5a15de7838b32122c61b6d2462543ba424
