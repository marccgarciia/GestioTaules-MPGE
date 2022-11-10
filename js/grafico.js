window.onload = (event) => {
    var arrayClose= document.getElementsByClassName('modalclose')
    for (let i=0; i<arrayClose.length; i++){
        console.log(arrayClose[i])
        arrayClose[i].classList.add('invisible')
    }
};
function graficoMediasHora (indices,datos) {
    const labels = indices;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Terraza',
            data: datos,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    const config = {
        type: 'line',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );


}
