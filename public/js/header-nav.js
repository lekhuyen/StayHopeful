$(document).ready(function() {
    $('.search-input-icon-child').click(function(){
        $('#nav-mobile').slideToggle();
    })
})

$('.nav-mobile-interface').click(function(){
    $('.nav-mobile-interface .nav-sub-menu-title').not($(this).find('.nav-sub-menu-title')).slideUp();
    $(this).find('.nav-sub-menu-title').slideToggle(); 
    $(this).find('.dropdown').toggleClass('rotate-slide');
});

$(document).on('click',function(e){
    
});