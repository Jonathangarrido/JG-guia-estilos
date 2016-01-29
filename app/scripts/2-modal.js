// File: modal.js
'use strict';


$('.modal--btn').click(function(){

  // Busco si hay ya creando un .modal 
  var c = $('.modal').length;
  if(c === 0){
    // lo creo si no lo hay
    $('body').append('<div class="modal"></div>');
  }

  // selecciono el elemento modal 
  // y lo gardo en una variable
  var m = $('.modal');


  //selecciono el contenido que deseo ver
  // en el modal agregandolo a una variable
  var info = $(this).siblings('.modal--info').text();

  // creo el contenido interno del modal
  var conte = "<div class='modal-contenedor modal-center'><div class='modal-info'><p>"+info+"</p><button class='btn--success btn--large modal-btn-cerrar'>ok</button><button class='modal-cerrar modal-btn-cerrar'></button></div></div>";

  // Agrego el contenido a modal
  m.append(conte);


  // pregunto si el estilo es largo o corto
  // y elimino clase correpondiente
  var estilo = $(this).attr('data-modal');

  if(estilo === 'large'){
    $('.modal-center').removeClass('modal-center');
  }


  var i = $('.modal-info');

  // muestro modal oculto
  function mostrar(){
    m.fadeIn('fast');
    i.toggleClass('entrada');
    $('body').css('overflow-y','hidden');
  }

  mostrar();
  
  // escondo modal oculto
  $('.modal-btn-cerrar').click(function(){
    m.fadeOut('fast');
    i.toggleClass('entrada');
    m.html(' ');
    $('body').css('overflow-y','scroll');
  });
    
});
