$(document).ready(function() {
  $('.nav-button').click(function() {
    $('.nav-button').toggleClass('change');
  });

  $(window).scroll(function() {
    let position = $(this).scrollTop();
    if(position >= 500) {
      $('.nav-menu').addClass('custom-navbar');
    } else {
      $('.nav-menu').removeClass('custom-navbar');
    }
  });
});

jQuery(function($){

  $("p.Question").css({cursor:"pointer"}).click(function(){
  
  $(this).next().toggle("normal");
  
  });
  
  });


