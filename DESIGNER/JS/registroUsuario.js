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

// $(function(){
//
//   $('.validanumericos').keypress(function(e) {
// 	if(isNaN(this.value + String.fromCharCode(e.charCode)))
//      return false;
//   })
//   .on("cut copy paste",function(e){
// 	e.preventDefault();
//   });
//
// });
