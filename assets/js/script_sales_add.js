function selectClient(obj){
    var id = $(obj).attr('data-id');
    var name = $(obj).html();
    $('.searchresults').hide();
    $('#client_name').val(name);
   //$('#client_name').attr('data-id', id);
    $('input[name_id]').val(id);
}


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
  
});