function openPopup(obj){
    var data = $(obj).serialize();
    
    var url=BASE_URL+"/Report/sales_pdf?"+data;
    window.open(url, "Report", "width=700,height=500");
    
    return false;
}


$(function(){
    $('input[name=period1]').mask('00/00/0000',{reverse:true, placeholder:"00/00/0000"});
 $('input[name=period2]').mask('00/00/0000',{reverse:true, placeholder:"00/00/0000"});

});

function selectClient(obj){
    var id = $(obj).attr('data-id');
    var name = $(obj).html();
    $('.searchresults').hide();
    $('#client_name').val(name);
   //$('#client_name').attr('data-id', id);
   // $('input[name=client_id]').val(id);
    }
    

   
$(function() {
    
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

