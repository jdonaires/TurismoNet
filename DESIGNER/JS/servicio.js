function buscar()
{

  var idServicio = document.getElementById('idservicioEmpresa').value;
  var nombre = document.getElementById('nombrerUser').value;
  var ruc = document.getElementById('numeroRuc').value;

  var dataen = 'idservicioEmpresa=' + idServicio + '&nombrerUser=' + nombre + '&ruc=' + ruc;
  $.ajax({
    type:"post",
    url:"Servicio/frm_buscarServicio.php",
    data:dataen,
    success:function(r)
    {
      datos=jQuery.parseJSON(r);
      $('#nombreServicioU').val(datos['nombreServicio']);
      $('#horarioAtenciónU').val(datos['horarioAtención']);
      $('#descripcionServicioU').val(datos['descripcionServicio']);
    }
  });
}
// $(document).ready(function() {
//
//   function buscar()
//   {
//
//     var idServicio = document.getElementById('idservicioEmpresa').value;
//     var nombre = document.getElementById('nombrerUser').value;
//     var ruc = document.getElementById('numeroRuc').value;
//
//     var dataen = 'idservicioEmpresa=' + idServicio + '&nombrerUser=' + nombre + '&ruc=' + ruc;
//     $.ajax({
//       type:"post",
//       url:"Servicio/frm_buscarServicio.php",
//       data:dataen,
//       success:function(r)
//       {
//         datos=jQuery.parseJSON(r);
//         $('#nombreServicioU').val(datos['nombreServicio']);
//         $('#horarioAtenciónU').val(datos['horarioAtención']);
//         $('#descripcionServicioU').val(datos['descripcionServicio']);
//       }
//     });
//   }
//
// });
