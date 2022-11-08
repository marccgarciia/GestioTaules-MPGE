window.onload = (event) => {
    var array= document.getElementsByName('js-open-modal');
    console.log(array)
    for (const i in array) {
        console.log(array[i])
        array[i].addEventListener("click" , function (eve){
            document.getElementById('modal').classList.add('visible')
        })
    }
    console.log(  document.getElementsByClassName('js-close-modal'))


};


function clickMe(id, estado, sala) {
    var cambio ='si';
    window.location.href='../view/mostrarMesas.php?sala='+sala + '&est='+estado + '&id=' +id+'&camb='+ cambio
}