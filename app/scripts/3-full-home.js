/* DIV FULL VIEWPORT */
/*
  Div al 100% de alto y ancho
  No cambia el 100% en google mobil
*/
/*
  HTML
    <div class="full-home"></div>

  SCRIPT
    AGREGAR AL CARGAR 
      fullHome();

  SASS
    @include full-home
*/
var full__home = true

if(full__home){
  var fullHome = function(){
    var fullDiv = $('.full-home');
    var altura = $( window ).height();
    fullDiv.css('height', altura + 'px');
  }
}