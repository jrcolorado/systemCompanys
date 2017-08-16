$('input[name=addres_zipcode]').on('blur', function(){
    var cep = $(this).val();
    
    $.ajax({
        url:'http://api.postmon.com.br/v1/cep/'+cep,
        type:'GET',
        dataType:'json',
        success:function(json){
            if(typeof json.logradouro != 'undefined'){
                $('input[name=addres]').val(json.logradouro);
                $('input[name=addres_neighb]').val(json.bairro);
                $('input[name=addres_city]').val(json.cidade);
                $('input[name=addres_state]').val(json.estado);
                $('input[name=addres_country]').val("BRASIL");
                $('input[name=addres_number1]').focus();
            }
            
        }
    });
});

