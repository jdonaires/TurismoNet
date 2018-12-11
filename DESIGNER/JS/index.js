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
  $('#lisempresas').click(function() {
    $('#contenido').load("lis_Empresas.php");
  });
});
