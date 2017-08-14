function selectClient(obj){
    var id = $(obj).attr('data-id');
    var name = $(obj).html();
    $('.searchresults').hide();
    $('#client_name').val(name);
   ///$('#client_name').attr('data-id', id);
    $('input[name=client_id]').val(id);
    }
    
    
function excluiProd(obj){
    $(obj).closest('tr').remove();
    updateTotal();
    }
    
// função que calcula total da venda
function updateTotal(){
    
    var total = 0; //inicia total com valor 0
   //percorre todos itens com a inofrmacao de p_qtd
    for(var q=0;q<$('.p_qtd').length;q++){
        var quant = $('.p_qtd').eq(q);
        var price=quant.attr('data-price');
        var subtotal = price * parseInt(quant.val());
        total += subtotal;
     }
     
     $('input[name=total_price]').val(total);
     
}
    
function updateSubtotal(obj){
   
    var quant = $(obj).val();     
    if(quant <= 0){  
        $(obj).val(1);
        quant =1;
    }
    
     var estoque = $(obj).attr('data-quant');
     
     if(quant > estoque){  
        $(obj).val();
        quant = estoque;
    }
        var price = $(obj).attr('data-price');
        var subtotal = price * quant;
       
        
    $(obj).closest('tr').find('.subtotal').html('R$ '+subtotal);
    updateTotal()   
}

function addProd(obj){
    
    $('#add_prod').val(''); // limpa o campo para nova consulta
    var id = $(obj).attr('data-id');
    var price= $(obj).attr('data-price');
    var name = $(obj).attr('data-name');
    var quant = $(obj).attr('data-quant');
    $('.searchresults').hide();
   
    if($('input[name="quant['+id+']"]').length == 0){
            var tr = '<tr>' +
                '<td>' + name + '</td>' +
                '<td style="text-align: center">' + quant + '</td>' +
                '<td style="text-align: center">' +
                '<input type="number" name="quant[' + id + ']" class="p_qtd" value="1" onchange="updateSubtotal(this)" data-price="' + price + '"/>' +
                '</td>' +
                '<td>R$ ' + price + '</td>' +
                '<td class="subtotal">R$ ' + price + '</td>' +
                '<td style="text-align: center"><a href="javascript:;" onclick="excluiProd(this)"><img src="' + BASE_URL + '/assets/images/remove.png' + '" border="0" width="20"></a></td>' +
                '</tr>';


        
        $('#product_table').append(tr);
        updateTotal();
}
    
}

   $('#add_prod').on('focus', function(){
       $(this).animate({
           width: '450px'
       },'fast');
       
   });
   
   $('#add_prod').on('blur', function(){
       if($(this).val() == ''){
            $(this).animate({           
           width: '450px'
       },'fast');
   }  
    setTimeout(function(){
         $('.searchresults').hide(); 
    }, 500);
   
   });
   
   
$(function() {
    //inclui mascara de valor no total das vendas
   $('input[name=total_price]').mask('000.000.000,00',{reverse:true, placeholder:"0,00"});
   // remove a janela do resultado de busca
   $('.tabitem').on('click', function(){
       //exclui de todos 
       $('.activetab').removeClass('activetab');
       //mostra somente na escolhida
       $(this).addClass('activetab');
       
       var item = $('.activetab').index();
       //remove todos
       $('.tabbody').hide();
       //mostra somente na escolhoda
       $('.tabbody').eq(item).show();
   }); 
   
   
   $('#client_name').on('focus', function(){
       $(this).animate({
           width: '450px'
       },'fast');
       
   });
   
   $('.client_add_button').on('click', function(e){
       e.preventDefault();
       var name = $('#client_name').val();
       if(name != '' && name.length >= 4){
           if(confirm('Você deseja adicionar um cliente com nome: '+name+'?')){
               $.ajax({
                   url:BASE_URL+'/Ajax/add_client',
                   type:'POST',
                   data:{name:name},
                   dataType:'json',
                   success:function(json){
                       $('.searchresults').hide();
                       $('#client_name').attr('data-id', json.id);
                     
                       
                   }
               });
               
               return false;
           }
       }
       
   });
   
   $('#client_name').on('blur', function(){
       if($(this).val() == ''){
            $(this).animate({           
           width: '450px'
       },'fast');
   }  
    setTimeout(function(){
         $('.searchresults').hide(); 
    }, 500);
   
   });
    
    
  $('#client_name').on('keyup', function(){
         var datatype = $(this).attr('data-type');
         var q = $(this).val();
         
         if(datatype != ''){
             $.ajax({
                 url:BASE_URL+'/Ajax/'+datatype,
                 type: 'GET',
                 data:{q:q},
                 dataType:'json',
                 success:function(json){
                     if($('.searchresults').length == 0){
                         $('#client_name').after('<div class="searchresults"></div>');
                        }
                    $('.searchresults').css('left', $('#client_name').offset().left+'px');
                    $('.searchresults').css('top', $('#client_name').offset().top+$('#client_name').height()+3+'px');
                    
                    var html='';
                    
                    for(var i in json){
                        html += '<div class="si"><a href="javascript:;" onclick="selectClient(this)" data-id="'+json[i].id+'">'+json[i].name+'</a></div>';
                    }
                    
                    
                    $('.searchresults').html(html);
                    $('.searchresults').show();
                     
                 }
                    
           });}
       
   });
   
   
   
    $('#add_prod').on('keyup', function(){
         var datatype = $(this).attr('data-type');
         var q = $(this).val();
         
         if(datatype != ''){
             $.ajax({
                 url:BASE_URL+'/Ajax/'+datatype,
                 type: 'GET',
                 data:{q:q},
                 dataType:'json',
                 success:function(json){
                     if($('.searchresults').length == 0){
                         $('#add_prod').after('<div class="searchresults"></div>');
                        }
                    $('.searchresults').css('left', $('#add_prod').offset().left+'px');
                    $('.searchresults').css('top', $('#add_prod').offset().top+$('#add_prod').height()+3+'px');
                    
                    var html='';
                    
                    for(var i in json){
                        html += '<div class="si"><a href="javascript:;" onclick="addProd(this)" data-id="'+json[i].id+'" data-name="'+json[i].name+'" data-quant="'+json[i].quant+'" data-price="'+json[i].price+'">'+json[i].name+' - R$ '+json[i].price+'</a></div>';
                    }
                    
                    
                    $('.searchresults').html(html);
                    $('.searchresults').show();
                     
                 }
                    
           });}
       
   });
   
   
   
  
});