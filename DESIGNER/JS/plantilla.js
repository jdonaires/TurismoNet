$(document).ready(function() {
  $('.menu li:has(ul)').click(function(e) {
    e.preventDefault();

    if ($(this).hasClass('activado')) {
      $(this).removeClass('activado');
      $(this).children('ul').slideUp();
    } else {
      $('.menu li ul').slideUp();
      $('.menu li').removeClass('activado');
      $(this).addClass('activado');
      $(this).children('ul').slideDown();
    }
  });


  // PARA LLAMAR A LOS FORMULARIOS
  $('#persona').click(function() {
      $('#contenido').load("registro.php");
  });
  $('#reg-productos').click(function() {
    $('#contenido').load("reg_producto.php");
  });
  $('#Inicio').click(function() {
    $('#contenido').load("presentacion.php");
  });
  $('#Venta').click(function() {
    $('#contenido').load("reg_venta.php");
  });
});
