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

    document.getElementById('submit').addEventListener("submit" , function (e){
        var comen = document.getElementById('comensales').value
        var cambio ='si';
        document.getElementById("form").action = '../view/mostrarMesas.php?sala='+sala + '&est='+estado + '&id=' +id+'&camb='+ cambio+'&comen='+comen;
    })


}

