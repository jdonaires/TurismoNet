$(document).ready(function() {
  $('#index').click(function() {
    $('#contenido').load("lis_Lugares.php");
  });
  $('#login').click(function() {
    $('#contenido').load("login.php");
  });
  $('#regUsuario').click(function() {
    $('#contenido').load("registroUsuario.php");
  });
  $('#Venta').click(function() {
    $('#contenido').load("reg_venta.php");
  });
});
