$(document).ready(
  function(){
    $("#body a img.ro").hover(function(){
      $(this).css('opacity', '0.8');
    },function(){
      $(this).css('opacity', '1');
    });
  });