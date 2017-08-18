 
var rel1 = new Chart(document.getElementById("rel1"),{
    type: 'line',//bar
    data: {
        labels:days_list,
        datasets:[{
                label:'Receita',
                data:[5,6,9,3],
                fill: false,
                backgroundColor:'#0000FF',
                borderColor:'#0000FF'
        }, {
            
            label:'Despesa',
                data:[7,4,6,5],
                fill: false,
                backgroundColor:'#FF0000',
                borderColor:'#FF0000'
            
        }]
    }
});



var rel2 = new Chart(document.getElementById("rel2"),{
    type: 'pie',
    data: {
        labels:['Pago', 'Cancelada','Aguardando pgto.'],
        datasets:[{              
            data:[4,2,6],
                backgroundColor:['#FFce56','#FF6384','#36A2EB']
            }]
    }
       
});


    


