$(document).ready(function(){        
    var originalSize = $('h3').css('font-size');         
   // reset        
    $(".resetMe").click(function(){           
   $('h3').css('font-size', originalSize);         
    });
  
    // Increase Font Size          
    $(".increase").click(function(){         
   var currentSize = $('h3').css('font-size');         
   var currentSize = parseFloat(currentSize)*1.2;          
   $('h3').css('font-size', currentSize);         
   return false;          
   });        
   




   
    // Decrease Font Size       
    $(".decrease").click(function(){        
    var currentFontSize = $('h3').css('font-size');        
    var currentSize = $('h3').css('font-size');        
    var currentSize = parseFloat(currentSize)*0.8;        
    $('h3').css('font-size', currentSize);         
    return false;         
    });         
  });
  