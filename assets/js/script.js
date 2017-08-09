$(function() {
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
   
   
   $('#busca').on('focus', function(){
       $(this).animate({
           width: '350px'
       },'fast');
       
   });
   
   $('#busca').on('blur', function(){
       if($(this).val() == ''){
            $(this).animate({           
           width: '100px'
       },'fast');
   }  
    setTimeout(function(){
         $('.searchresults').hide(); 
    }, 500);
   
   });
   
   $('#busca').on('keyup', function(){
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
                         $('#busca').after('<div class="searchresults"></div>');
                        }
                    $('.searchresults').css('left', $('#busca').offset().left+'px');
                    $('.searchresults').css('top', $('#busca').offset().top+$('#busca').height()+3+'px');
                    
                    var html='';
                    
                    for(var i in json){
                        html += '<div class="si"><a href="'+json[i].link+'">'+json[i].name+'</a></div>';
                    }
                    
                    
                    $('.searchresults').html(html);
                    $('.searchresults').show();
                     
                 }
                    
           });}
       
   });
  
});