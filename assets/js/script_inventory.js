$(function(){
    $('input[name=price]').mask('000.000.000,00',{reverse:true, placeholder:"0,00"});
});


$("#clickMe").click(function () {
    $(".myForms").trigger('submit'); 
});




