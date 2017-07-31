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
  
});