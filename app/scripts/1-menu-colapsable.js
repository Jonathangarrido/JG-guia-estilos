// File: menu-colapsable.js
'use strict';

var device = navigator.userAgent;

if (device.match(/Iphone/i)|| device.match(/Ipod/i)|| device.match(/Android/i)|| device.match(/J2ME/i)|| device.match(/BlackBerry/i)|| device.match(/iPhone|iPad|iPod/i)|| device.match(/Opera Mini/i)|| device.match(/IEMobile/i)|| device.match(/Mobile/i)|| device.match(/Windows Phone/i)|| device.match(/windows mobile/i)|| device.match(/windows ce/i)|| device.match(/webOS/i)|| device.match(/palm/i)|| device.match(/bada/i)|| device.match(/series60/i)|| device.match(/nokia/i)|| device.match(/symbian/i)|| device.match(/HTC/i)){ 
 
  var myElement = document.getElementById('colapsable-area');
  var mc = new Hammer(myElement);

  mc.on("panright", function(ev) {
    clickColapsable('abrir');
  });

  var myElement2 = document.getElementById('menu-colapsable');
  var mc2 = new Hammer(myElement2);

  mc2.on("panleft", function(ev) {
    clickColapsable('cerrar');
  });
}

function clickColapsable(n){
  if(n==='abrir'){
    $('.colapsable-fondo').fadeIn(300);
    $('.colapsable-nav').addClass('colapsable-transition');
    $('body').addClass('contenido-block');
  }
  else{
    $('.colapsable-fondo').fadeOut(300);
    $('.colapsable-nav').removeClass('colapsable-transition');
    $('body').removeClass('contenido-block');
  }
}
$(".colapsable-nav a").click(function(event) {
  clickColapsable('cerrar')
});