$(document).ready(function()
{
	$('#iletisim_formu').on("keyup",function()
	{
		iletisimform_kontrolu();
	});
});


var iletisimform_kontrolu=function()
{
	var mad = $("#mad").val();
	var msoyad= $("#msoyad").val();
	var meposta=$("#meposta").val();
	var mkonu=$("#mkonu").val();
	var mtel=$("#mtel").val();
	var mesaj_icerik=$("#micerik").val();
	var atpos=meposta.indexOf("@");
	var dotpos=meposta.lastIndexOf(".");

	if( mad==null || mad=="")
		$('.uyari').html("Adınız Boş Olamaz.");
	else if(msoyad==null || msoyad=="")
		$('.uyari').html("Soyadınız Boş Olamaz.");
	else if(mkonu==null || mkonu=="")
		$('.uyari').html("Konu Boş Olamaz.");
	else if(mtel==null || mtel==""||mtel.length!=11)
		$('.uyari').html("Telefon Numaranız 11 karakter Olmalı");
	else if(mesaj_icerik==null || mesaj_icerik=="")
		$('.uyari').html("Mesaj Boş Olamaz.");
	else if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=meposta.length )
		$('.uyari').html("Geçerli email adresi girin");
	else
	{
		$('.uyari').empty();
		$('#iletisim_formu').removeAttr('onsubmit');
	}
}

$(document).ready(function()
{
	$('#giris_formu').on("keyup",function()
	{
		girisform_kontrolu();
	});
});


var girisform_kontrolu=function()
{
	var giriseposta=$("#giris_eposta").val();
	var giris_sifre=$("#giris_sifre").val();
	var atpos=giriseposta.indexOf("@");
	var dotpos=giriseposta.lastIndexOf(".");

	if( giris_sifre==null || giris_sifre=="")
		$('.uyari').html("Şifre Boş Olamaz.");
	else if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=giriseposta.length )
		$('.uyari').html("Geçerli email adresi girin");
	else
	{
		$('.uyari').empty();
		$('#giris_formu').removeAttr('onsubmit');
	}
}
$(document).ready(function()
{
	$('#kayit_formu').on("keyup",function()
	{
		kayitform_kontrolu();
	});
});


var kayitform_kontrolu=function()
{
	var kayit_adsoyad=$("#kayit_adsoyad").val();
	var kayit_eposta=$("#kayit_email").val();
	var kayit_sifre=$("#kayit_sifre").val();
	var atpos=kayit_eposta.indexOf("@");
	var dotpos=kayit_eposta.lastIndexOf(".");

	if( kayit_adsoyad==null || kayit_adsoyad=="")
		$('#hata').html("Ad Soyad Boş Olamaz.");
	else if( kayit_sifre==null || kayit_sifre=="")
		$('#hata').html("Ad Soyad Boş Olamaz.");
	else if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=kayit_eposta.length )
		$('#hata').html("Geçerli email adresi girin");
	else
	{
		$('#hata').empty();
		$('#kayit_formu').removeAttr('onsubmit');
	}
}
