$(document).ready(function(){
    $('.menu li:has(ul)').click(function(e){
        e.preventDefault();

    });
});


$('.desplegarU').click(function(){
    $('#datos-usuario').slideToggle();    
})

$('.desplegarP').click(function(){
    $('#datos-presupuesto').slideToggle();    
})