// File: Main.js
'use strict';

function cargar(){
  $('.transition-entrada').addClass('entrada');
}

function master(){
  $('.master-g').fadeToggle();
}

function Planta(n){
  if (n) {
    $('.planta-conte').addClass('planta-full');
    $('.planta-conte').attr('onclick','Planta(0)');
    $('.cerrar').addClass('indexdown');
    $('.cerrar-planta').fadeIn(0);
    // console.log('abrir fullplanta');

  } else{
    $('.planta-conte').removeClass('planta-full');
    $('.planta-conte').attr('onclick','Planta(1)');
    $('.cerrar').removeClass('indexdown');
    $('.cerrar-planta').fadeOut(0);
    // console.log('cerrar fullplanta');
  }
  
}

function getAbsolutePath() {
  var loc = window.location;
  var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
  return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}


function redireccion(archivo, id){
  var p = getAbsolutePath()+""+archivo+".php?id="+id;
  $('.transition-salida').addClass('salida-posicion');
  if(archivo === 'index'){
    p = getAbsolutePath()+"index.php";
  }
  window.setTimeout(function(){
    window.location = p;
  }, 300);

}




$(function(){
  var linkDestino;
  function redireccionarPag() {
    window.location = linkDestino;
  }
  
  $('a.transicion').click(function(event){
    event.preventDefault();
    // linkDestino = this.href;
    // $('.transition-salida').addClass('salida-posicion');
    // window.setTimeout(redireccionarPag, 300);
  });

  window.setTimeout(cargar, 300);
});



