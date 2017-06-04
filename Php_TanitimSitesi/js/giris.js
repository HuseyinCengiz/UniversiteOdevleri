$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});


function validasyon(){
	if($('.adsoyad').val() == '' || $('.email').val() == '' || $('.pass').val() == '' )
	{
		alert("Alanlar boş geçilemez");
		return;
	}
};