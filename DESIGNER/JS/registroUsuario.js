$(document).ready(function(){
	$('ul.tabs li a:first').addClass('active');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});

	$('.numeros').keypress(function(e) {
	if(isNaN(this.value + String.fromCharCode(e.charCode)))
		 return false;
	})
	.on("cut copy paste",function(e){
	e.preventDefault();
	});
});

// $(window).load(function(){
//
//  $(function() {
//   $('#file-input').change(function(e) {
//       addImage(e);
//      });
//
//      function addImage(e){
//       var file = e.target.files[0],
//       imageType = /image.*/;
//
//       if (!file.type.match(imageType))
//        return;
//
//       var reader = new FileReader();
//       reader.onload = fileOnload;
//       reader.readAsDataURL(file);
//      }
//
//      function fileOnload(e) {
//       var result=e.target.result;
//       $('#imgSalida').attr("src",result);
//      }
//     });
//   });
