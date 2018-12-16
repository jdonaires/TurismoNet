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
  $('#reg_servicio').click(function() {
      $('#iframe').load("from_servicio.php");
  });
  $('#desactivar_servicio').click(function() {
    $('#iframe').load("frm_DestvServicio.php");
  });
  $('#MDServicio').click(function() {
    $('#iframe').load("frm_modifServicio.php");
  });
  $('#Venta').click(function() {
    $('#contenido').load("reg_venta.php");
  });
});
