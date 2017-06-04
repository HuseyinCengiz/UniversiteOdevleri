<?php 
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');
include "baglanti.php";
/*Site Genel Ayarları*/
if (isset($_POST['genelayar-kaydet']))
{

	$ayarkaydet=$db->prepare("UPDATE site_ayar SET 
		site_url=:url,
		site_title=:title,
		site_description=:description,
		site_keywords=:keywords,
		site_author=:author,
		site_galeri=:galeri
		where site_id=0");

	$guncelle=$ayarkaydet->execute(array(
		'url'=>$_POST["site_url"],
		'title'=>$_POST["site_title"],
		'description'=>$_POST["site_description"],
		'keywords'=>$_POST["site_keywords"],
		'author'=>$_POST["site_author"],
		'galeri'=>$_POST["site_galeri"]
		));
	if($guncelle)
	{
		header("Location:../genel-ayar.php?islem=true");
	}
	else
	{
		header("Location:../genel-ayar.php?islem=false");
	}
}
/*Site İletişim Ayarları*/
if (isset($_POST['iletisimayar-kaydet']))
{

	$ayarkaydet=$db->prepare("UPDATE site_ayar SET 
		site_tel=:tel,
		site_mail=:mail,
		site_adres=:adres,
		site_ilce=:ilce,
		site_il=:il
		where site_id=0");

	$guncelle=$ayarkaydet->execute(array(
		'tel'=>$_POST["site_tel"],
		'mail'=>$_POST["site_mail"],
		'adres'=>$_POST["site_adres"],
		'ilce'=>$_POST["site_ilce"],
		'il'=>$_POST["site_il"]
		));
	if($guncelle)
	{
		header("Location:../iletisim-ayar.php?islem=true");
	}
	else
	{
		header("Location:../iletisim-ayar.php?islem=false");
	}
}
/*Site Sosyal Medya Ayarları*/
if (isset($_POST['sosyalmedyaayar-kaydet']))
{
	$ayarkaydet=$db->prepare("UPDATE site_ayar SET 
		site_facebook=:facebook,
		site_twitter=:twitter,
		site_youtube=:youtube,
		site_google=:google
		where site_id=0");
	$guncelle=$ayarkaydet->execute(array(
		'facebook'=>$_POST["site_facebook"],
		'twitter'=>$_POST["site_twitter"],
		'youtube'=>$_POST["site_youtube"],
		'google'=>$_POST["site_google"]
		));
	if($guncelle)
	{
		header("Location:../sosyalmedya-ayar.php?islem=true");
	}
	else
	{
		header("Location:../sosyalmedya-ayar.php?islem=false");
	}
}
/*Site Logo Kaydet*/
if (isset($_POST['sitelogo-kaydet']))
{
	$MaxBoyut=6000000;//Byte
	$kaydedilecekdizin="../../myimg/";
	$dosyaUzantisi=substr($_FILES["site_logo"]["name"],-4,4);
	$benzersiz1=rand(1000,9999);
	$benzersiz2=rand(1000,9999);
	$dosyaAdi=$benzersiz1.$benzersiz2.$dosyaUzantisi;
	$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;

	if ($_FILES["site_logo"]["size"]>$MaxBoyut)
	{
		header("Location:../genel-ayar.php?logo=boyut");
	}
	else
	{
		$resimTuru=$_FILES["site_logo"]["type"];
		if($resimTuru=="image/jpeg"||$resimTuru=="image/png")
		{
			/*$_FILES["site_logo"]["tmp_name"]=Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.*/
			if(is_uploaded_file($_FILES["site_logo"]["tmp_name"]))//Geçici yere geldimi
			{
				$tasi=move_uploaded_file($_FILES["site_logo"]["tmp_name"], $dosyaYolu);
				if($tasi)
				{
					$ayarkaydet=$db->prepare("UPDATE site_ayar SET 
						site_logo=:logo
						where site_id=0");
					$logoguncelle=$ayarkaydet->execute(array(
						'logo'=>substr($dosyaYolu,6)
						));
					if($logoguncelle)
					{
						header("Location:../genel-ayar.php?logo=true");
					}
					else
					{
						header("Location:../genel-ayar.php?logo=false");
					}
				}
				else{
					header("Location:../genel-ayar.php?logo=tasima");
				}
			}
			else
			{
				header("Location:../genel-ayar.php?logo=gecici");
			}
		}
		else
		{
			header("Location:../genel-ayar.php?logo=tur");
		}
	}
}
/*Hakkımızda Kaydet*/
if (isset($_POST['hakkimizda-kaydet']))
{
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET 
		hakkimizda_baslik=:baslik,
		hakkimizda_icerik=:icerik
		where hakkimizda_id=0");
	$guncelle=$ayarkaydet->execute(array(
		'baslik'=>$_POST["hakkimizda_baslik"],
		'icerik'=>$_POST["hakkimizda_icerik"]
		));
	if($guncelle)
	{
		header("Location:../hakkimizda.php?islem=true");
	}
	else
	{
		header("Location:../hakkimizda.php?islem=false");
	}
}
/*Slider Oluştur*/
if (isset($_POST['slider-ekle']))
{
	$MaxBoyut=6000000;//Byte
	$kaydedilecekdizin="../../myimg/Slider/";
	$dosyaUzantisi=substr($_FILES["slider_resimyol"]["name"],-4,4);
	$benzersiz1=rand(10000,99999);
	$benzersiz2=rand(10000,99999);
	$dosyaAdi=$benzersiz1.$benzersiz2.$dosyaUzantisi;
	$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;

	if ($_FILES["slider_resimyol"]["size"]>$MaxBoyut)
	{
		header("Location:../slider.php?durum=boyut");
	}
	else
	{
		$resimTuru=$_FILES["slider_resimyol"]["type"];
		if($resimTuru=="image/jpeg"||$resimTuru=="image/png")
		{
			/*$_FILES["site_logo"]["tmp_name"]=Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.*/
			if(is_uploaded_file($_FILES["slider_resimyol"]["tmp_name"]))//Geçici yere geldimi
			{
				$tasi=move_uploaded_file($_FILES["slider_resimyol"]["tmp_name"], $dosyaYolu);
				if($tasi)
				{
					$sliderDurum=($_POST["slider_durum"]==true)? true:false;
					$sliderekle=$db->prepare("INSERT INTO slider ( slider_ad,slider_aciklama,slider_resimyol,slider_link,slider_sira,slider_durum) VALUES (:ad,:aciklama,:resim,:link,:sira,:durum)");
					$sliderkaydet=$sliderekle->execute(array(
						'ad'=>$_POST["slider_ad"],
						'aciklama'=>$_POST["slider_aciklama"],
						'link'=>$_POST["slider_link"],
						'sira'=>$_POST["slider_sira"],
						'durum'=>$sliderDurum,
						'resim'=>substr($dosyaYolu,6)
						));
					if($sliderkaydet)
					{
						header("Location:../slider.php?durum=true");
					}
					else
					{
						header("Location:../slider.php?durum=false");
					}
				}
				else{
					header("Location:../slider.php?durum=tasima");
				}
			}
			else
			{
				header("Location:../slider.php?durum=gecici");
			}
		}
		else
		{
			header("Location:../slider.php?durum=tur");
		}
	}
}
/*Slider Sil*/
if (@$_GET["slidersil"]=="ok") {
	$sil=$db->prepare("DELETE FROM slider where slider_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["slider_id"]));
	if($ok)
	{
		header("Location:../slider.php?durum=true");
	}
	else{
		header("Location:../slider.php?durum=false");
	}
}
/*Slider Güncelle*/
if (isset($_POST['slider-guncelle']))
{
	if($_FILES["slider_resimyol"]["size"]>0)
	{
		$kaydedilecekdizin="../../myimg/Slider/";
		$dosyaUzantisi=substr($_FILES["slider_resimyol"]["name"], -4,4);
		$benzersiz3=rand(20000,32000);
		$benzersiz4=rand(20000,32000);
		$dosyaAdi=$benzersiz3.$benzersiz4.$dosyaUzantisi;
		$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;
		$tasi=move_uploaded_file($_FILES["slider_resimyol"]["tmp_name"],$dosyaYolu);
		$id=$_POST["slider_id"];
		$slider_durum=($_POST['slider_durum']==true) ? true:false; 
		$sliderduzenle=$db->prepare("UPDATE slider SET 
			slider_ad=:ad,
			slider_resimyol=:yol,
			slider_aciklama=:aciklama,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum
			WHERE slider_id={$id}");
		$update=$sliderduzenle->execute(array(
			'ad'=>$_POST['slider_ad'],
			'aciklama'=>$_POST['slider_aciklama'],
			'yol'=>substr($dosyaYolu,6),
			'link'=>$_POST['slider_link'],
			'sira'=>$_POST['slider_sira'],
			'durum'=>$slider_durum
			));
		if($update)
		{
			$resimsilunlink=$_POST["slider_resimyol"];
			unlink("../../$resimsilunlink");
			header("Location:../slider-duzenle.php?slider_id={$id}&durum=true");
		}
		else{
			header("Location:../slider-duzenle.php?slider_id={$id}&durum=false");
		}
	}
	else{
		$id=$_POST["slider_id"];
		$slider_durum=($_POST['slider_durum']==true) ? true:false; 
		$sliderduzenle=$db->prepare("UPDATE slider SET 
			slider_ad=:ad,
			slider_link=:link,
			slider_aciklama=:aciklama,
			slider_sira=:sira,
			slider_durum=:durum
			WHERE slider_id={$id}");
		$update=$sliderduzenle->execute(array(
			'ad'=>$_POST['slider_ad'],
			'link'=>$_POST['slider_link'],
			'aciklama'=>$_POST['slider_aciklama'],
			'sira'=>$_POST['slider_sira'],
			'durum'=>$slider_durum
			));
		if($update)
		{
			header("Location:../slider-duzenle.php?slider_id={$id}&durum=true");
		}
		else{
			header("Location:../slider-duzenle.php?slider_id={$id}&durum=false");
		}
	}
}
/*Haber Oluştur*/
if (isset($_POST['haber-ekle']))
{
	$MaxBoyut=6000000;//Byte
	$kaydedilecekdizin="../../myimg/Haber/";
	$dosyaUzantisi=substr($_FILES["haber_resimyol"]["name"],-4,4);
	$benzersiz1=rand(10000,99999);
	$benzersiz2=rand(10000,99999);
	$dosyaAdi=$benzersiz1.$benzersiz2.$dosyaUzantisi;
	$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;

	if ($_FILES["haber_resimyol"]["size"]>$MaxBoyut)
	{
		header("Location:../haber.php?durum=boyut");
	}
	else
	{
		$resimTuru=$_FILES["haber_resimyol"]["type"];
		if($resimTuru=="image/jpeg"||$resimTuru=="image/png")
		{
			/*$_FILES["site_logo"]["tmp_name"]=Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.*/
			if(is_uploaded_file($_FILES["haber_resimyol"]["tmp_name"]))//Geçici yere geldimi
			{
				$tarih=date('d.m.Y H:i:s');
				$tasi=move_uploaded_file($_FILES["haber_resimyol"]["tmp_name"], $dosyaYolu);
				if($tasi)
				{
					$haberDurum=($_POST["haber_durum"]==true)? true:false;
					$haberekle=$db->prepare("INSERT INTO haber ( haber_ad,haber_zaman,haber_detay,haber_tanitim,haber_resimyol,haber_goruntulenme,haber_durum,kategori_id) VALUES (:ad,:zaman,:detay,:tanitim,:resim,:goruntulenme,:durum,:kid)");
					$haberkaydet=$haberekle->execute(array(
						'ad'=>$_POST["haber_ad"],
						'zaman'=>$tarih,
						'tanitim'=>$_POST["haber_tanitim"],
						'detay'=>$_POST["haber_detay"],
						'durum'=>$haberDurum,
						'goruntulenme'=>0,
						'kid'=>$_POST["kategori_id"],
						'resim'=>substr($dosyaYolu,6)
						));
					if($haberkaydet)
					{
						header("Location:../haber.php?durum=true");
					}
					else
					{
						header("Location:../haber.php?durum=false");
					}
				}
				else{
					header("Location:../haber.php?durum=tasima");
				}
			}
			else
			{
				header("Location:../haber.php?durum=gecici");
			}
		}
		else
		{
			header("Location:../haber.php?durum=tur");
		}
	}
}
/*Haber Sil*/
if (@$_GET["habersil"]=="ok") {
	$sil=$db->prepare("DELETE FROM haber where haber_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["haber_id"]));
	if($ok)
	{
		header("Location:../haber.php?durum=true");
	}
	else{
		header("Location:../haber.php?durum=false");
	}
}
/*Haber Güncelle*/
if (isset($_POST['haber-guncelle']))
{
	if($_FILES["haber_resimyol"]["size"]>0)
	{
		$kaydedilecekdizin="../../myimg/Haber/";
		$dosyaUzantisi=substr($_FILES["haber_resimyol"]["name"], -4,4);
		$benzersiz3=rand(20000,32000);
		$benzersiz4=rand(20000,32000);
		$dosyaAdi=$benzersiz3.$benzersiz4.$dosyaUzantisi;
		$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;
		$tasi=move_uploaded_file($_FILES["haber_resimyol"]["tmp_name"],$dosyaYolu);
		$id=$_POST["haber_id"];
		$tarih=date('d.m.Y H:i:s');
		$haber_durum=($_POST['haber_durum']==true) ? true:false; 
		$haberduzenle=$db->prepare("UPDATE haber SET 
			haber_ad=:ad,
			haber_resimyol=:yol,
			haber_zaman=:zaman,
			haber_detay=:detay,
			haber_tanitim=:tanitim,
			haber_durum=:durum,
			kategori_id=:kid
			WHERE haber_id={$id}");
		$update=$haberduzenle->execute(array(
			'ad'=>$_POST['haber_ad'],
			'yol'=>substr($dosyaYolu,6),
			'zaman'=>$tarih,
			'tanitim'=>$_POST["haber_tanitim"],
			'detay'=>$_POST['haber_detay'],
			'kid'=>$_POST['kategori_id'],
			'durum'=>$haber_durum
			));
		if($update)
		{
			$resimsilunlink=$_POST["haber_resimyol"];
			unlink("../../$resimsilunlink");
			header("Location:../haber-duzenle.php?haber_id={$id}&durum=true");
		}
		else{
			header("Location:../haber-duzenle.php?haber_id={$id}&durum=false");
		}
	}
	else{
		$id=$_POST["haber_id"];
		$tarih=date('d.m.Y H:i:s');
		$haber_durum=($_POST['haber_durum']==true) ? true:false; 
		$haberduzenle=$db->prepare("UPDATE haber SET 
			haber_ad=:ad,
			haber_zaman=:zaman,
			haber_detay=:detay,
			haber_tanitim=:tanitim,
			haber_durum=:durum,
			kategori_id=:kid
			WHERE haber_id={$id}");
		$update=$haberduzenle->execute(array(
			'ad'=>$_POST['haber_ad'],
			'zaman'=>$tarih,
			'detay'=>$_POST['haber_detay'],
			'tanitim'=>$_POST["haber_tanitim"],
			'durum'=>$haber_durum,
			'kid'=>$_POST['kategori_id']
			));
		if($update)
		{
			header("Location:../haber-duzenle.php?haber_id={$id}&durum=true");
		}
		else{
			header("Location:../haber-duzenle.php?haber_id={$id}&durum=false");
		}
	}
}
/*MENU EKLE*/
if (isset($_POST['menu-ekle']))
{
	$menu_durum=($_POST['menu_durum']==true) ? true:false; 
	$menuolustur=$db->prepare("INSERT INTO menu (menu_ust,menu_ikon,menu_ad,menu_url,menu_detay,menu_sira,menu_durum) VALUES (:ust,:ikon,:ad,:url,:detay,:sira,:drm)");
	$ekle=$menuolustur->execute(array(
		'ust'=>$_POST['menu_ust'],
		'ad'=>$_POST['menu_ad'],
		'ikon'=>$_POST['menu_ikon'],
		'url'=>$_POST['menu_url'],
		'detay'=>$_POST['menu_detay'],
		'sira'=>$_POST['menu_sira'],
		'drm'=>$menu_durum
		));
	if($ekle)
	{
		header("Location:../menu.php?durum=true");
	}
	else{
		header("Location:../menu.php?durum=false");
	}
}
/*Menu Sil*/
if (@$_GET["menusil"]=="ok") {
	$sil=$db->prepare("DELETE FROM menu where menu_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["menu_id"]));
	if($ok)
	{
		header("Location:../menu.php?durum=true");
	}
	else{
		header("Location:../menu.php?durum=false");
	}
}
/*Menu Düzenle*/
if (isset($_POST['menu-duzenle']))
{
	$menu_durum=($_POST['menu_durum']==true) ? true:false; 
	$id=$_POST["menu_id"];
	$menu=$db->prepare("UPDATE menu SET 
		menu_ust=:ust,
		menu_ad=:ad,
		menu_ikon=:ikon,
		menu_url=:url,
		menu_detay=:detay,
		menu_sira=:sira,
		menu_durum=:drm
		where menu_id={$id}");
	$guncelle=$menu->execute(array(
		'ust'=>$_POST['menu_ust'],
		'ad'=>$_POST['menu_ad'],
		'ikon'=>$_POST['menu_ikon'],
		'url'=>$_POST['menu_url'],
		'detay'=>$_POST['menu_detay'],
		'sira'=>$_POST['menu_sira'],
		'drm'=>$menu_durum
		));
	if($guncelle)
	{
		header("Location:../menu.php?durum=true");
	}
	else
	{
		header("Location:../menu.php?durum=false");
	}
}
/*Kategori EKLE*/
if (isset($_POST['kategori-ekle']))
{
	$kategoriolustur=$db->prepare("INSERT INTO kategori (kategori_ad,kategori_sira) VALUES (:ad,:sira)");
	$ekle=$kategoriolustur->execute(array(	
		'ad'=>$_POST['kategori_ad'],
		'sira'=>$_POST['kategori_sira']
		));
	if($ekle)
	{
		header("Location:../kategori.php?durum=true");
	}
	else{
		header("Location:../kategori.php?durum=false");
	}
}
/*Kategori Sil*/
if (@$_GET["kategorisil"]=="ok") {
	$sil=$db->prepare("DELETE FROM kategori where kategori_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["kategori_id"]));
	if($ok)
	{
		header("Location:../kategori.php?durum=true");
	}
	else{
		header("Location:../kategori.php?durum=false");
	}
}
/*Kategori Düzenleme*/
if (isset($_POST['kategori-duzenle']))
{
	$id=$_POST["kategori_id"];
	$kategori=$db->prepare("UPDATE kategori SET 
		kategori_ad=:ad,
		kategori_sira=:sira
		where kategori_id={$id}");
	$guncelle=$kategori->execute(array(
		'ad'=>$_POST['kategori_ad'],
		'sira'=>$_POST['kategori_sira']
		));
	if($guncelle)
	{
		header("Location:../kategori.php?durum=true");
	}
	else
	{
		header("Location:../kategori.php?durum=false");
	}
}
/*Galeri Oluştur*/
if (isset($_POST['galeri-ekle']))
{
	$MaxBoyut=6000000;//Byte
	$kaydedilecekdizin="../../myimg/Galeri/";
	$dosyaUzantisi=substr($_FILES["galeri_resimyol"]["name"],-4,4);
	$benzersiz1=rand(10000,99999);
	$benzersiz2=rand(10000,99999);
	$dosyaAdi=$benzersiz1.$benzersiz2.$dosyaUzantisi;
	$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;

	if ($_FILES["galeri_resimyol"]["size"]>$MaxBoyut)
	{
		header("Location:../galeri.php?durum=boyut");
	}
	else
	{
		$resimTuru=$_FILES["galeri_resimyol"]["type"];
		if($resimTuru=="image/jpeg"||$resimTuru=="image/png")
		{
			/*$_FILES["site_logo"]["tmp_name"]=Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.*/
			if(is_uploaded_file($_FILES["galeri_resimyol"]["tmp_name"]))//Geçici yere geldimi
			{
				$tasi=move_uploaded_file($_FILES["galeri_resimyol"]["tmp_name"], $dosyaYolu);
				if($tasi)
				{
					$galeriekle=$db->prepare("INSERT INTO galeri ( galeri_bilgi,galeri_resimyol) VALUES (:bilgi,:resim)");
					$galerikaydet=$galeriekle->execute(array(
						'bilgi'=>$_POST["galeri_bilgi"],
						'resim'=>substr($dosyaYolu,6)
						));
					if($galerikaydet)
					{
						header("Location:../galeri.php?durum=true");
					}
					else
					{
						header("Location:../galeri.php?durum=false");
					}
				}
				else{
					header("Location:../galeri.php?durum=tasima");
				}
			}
			else
			{
				header("Location:../galeri.php?durum=gecici");
			}
		}
		else
		{
			header("Location:../galeri.php?durum=tur");
		}
	}
}
/*Galeri Sil*/
if (@$_GET["galerisil"]=="ok") {
	$sil=$db->prepare("DELETE FROM galeri where galeri_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["galeri_id"]));
	if($ok)
	{
		$resimsillink=$_GET["resim"];
		unlink("../../$resimsillink");
		header("Location:../galeri.php?durum=true");
	}
	else{
		header("Location:../galeri.php?durum=false");
	}
}
/*Duyuru Sil*/
if (@$_GET["duyurusil"]=="ok") {
	$sil=$db->prepare("DELETE FROM duyuru where duyuru_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["duyuru_id"]));
	if($ok)
	{
		$resimsillink=$_GET["resim"];
		unlink("../../$resimsillink");
		header("Location:../duyuru.php?durum=true");
	}
	else{
		header("Location:../duyuru.php?durum=false");
	}
}
/*Galeri Oluştur*/
if (isset($_POST['duyuru-ekle']))
{
	$MaxBoyut=6000000;//Byte
	$kaydedilecekdizin="../../myimg/Duyuru/";
	$dosyaUzantisi=substr($_FILES["duyuru_resimyol"]["name"],-4,4);
	$benzersiz1=rand(10000,99999);
	$benzersiz2=rand(10000,99999);
	$dosyaAdi=$benzersiz1.$benzersiz2.$dosyaUzantisi;
	$dosyaYolu=$kaydedilecekdizin.$dosyaAdi;

	if ($_FILES["duyuru_resimyol"]["size"]>$MaxBoyut)
	{
		header("Location:../duyuru.php?durum=boyut");
	}
	else
	{
		$resimTuru=$_FILES["duyuru_resimyol"]["type"];
		if($resimTuru=="image/jpeg"||$resimTuru=="image/png")
		{
			/*$_FILES["site_logo"]["tmp_name"]=Yüklediğimiz dosyanın sunucu tarafından oluşturulan geçici kopyasının adını bizlere vermektedir.*/
			if(is_uploaded_file($_FILES["duyuru_resimyol"]["tmp_name"]))//Geçici yere geldimi
			{
				$tasi=move_uploaded_file($_FILES["duyuru_resimyol"]["tmp_name"], $dosyaYolu);
				if($tasi)
				{
					$galeriekle=$db->prepare("INSERT INTO duyuru (duyuru_bilgi,duyuru_resimyol) VALUES (:bilgi,:resim)");
					$galerikaydet=$galeriekle->execute(array(
						'bilgi'=>$_POST["duyuru_bilgi"],
						'resim'=>substr($dosyaYolu,6)
						));
					if($galerikaydet)
					{
						header("Location:../duyuru.php?durum=true");
					}
					else
					{
						header("Location:../duyuru.php?durum=false");
					}
				}
				else{
					header("Location:../duyuru.php?durum=tasima");
				}
			}
			else
			{
				header("Location:../duyuru.php?durum=gecici");
			}
		}
		else
		{
			header("Location:../duyuru.php?durum=tur");
		}
	}
}
/*Duyuru Sil*/
if (@$_GET["duyurusil"]=="ok") {
	$sil=$db->prepare("DELETE FROM duyuru where duyuru_id=:id");
	$ok=$sil->execute(array("id"=>$_GET["duyuru_id"]));
	if($ok)
	{
		$resimsillink=$_GET["resim"];
		unlink("../../$resimsillink");
		header("Location:../duyuru.php?durum=true");
	}
	else{
		header("Location:../duyuru.php?durum=false");
	}
}
/*Kayit Ol*/
if (isset($_POST["kayit-ol"]))
{
	$dosyaDizin="../../myimg/Kullanici/";
	$dosyaUzantisi=substr($_FILES["kullanici_profilresmi"]["name"], -4,4);
	$unique1=rand(20000,32000);
	$unique2=rand(20000,32000);
	$dosyaAdi=$unique1.$unique2.$dosyaUzantisi;
	$dosyaYolu=$dosyaDizin.$dosyaAdi;
	$tasi=move_uploaded_file($_FILES["kullanici_profilresmi"]["tmp_name"],$dosyaYolu);
	$varsayilanyetki="User";
	$tarih=date("d.m.Y H:i:s");
	$kullaniciolustur=$db->prepare("INSERT INTO kullanici (kullanici_adsoyad,kullanici_profilresmi,kullanici_eposta,kullanici_sifre,kullanici_kayittarihi,kullanici_yetki)
		VALUES (:adsoyad,:resim,:eposta,:sifre,:tarih,:yetki)");
	$kayit=$kullaniciolustur->execute(array(	
		'adsoyad'=>$_POST['kullanici_adsoyad'],
		'resim'=>substr($dosyaYolu,6),
		'yetki'=>$varsayilanyetki,
		'eposta'=>$_POST['kullanici_eposta'],
		'tarih'=>$tarih,
		'sifre'=>md5($_POST['kullanici_sifre'])
		));
	if($kayit)
	{
		header("Location:../../index.php");
	}
	else{
		header("Location:../../giris.php");
	}
}
/*Giriş Yap*/
if(isset($_POST["giris-yap"]))
{
	$k_ad=$_POST["kullanici_eposta"];
	$k_sifre=md5($_POST["kullanici_sifre"]);
	if(isset($k_ad)&&isset($k_sifre))
	{
		$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_eposta=:eposta AND kullanici_sifre=:sifre");
		$kullanicisor->execute(array("eposta"=>$k_ad,"sifre"=>$k_sifre));
		$veri_say=$kullanicisor->rowCount();
		$kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);

		if($veri_say>0)
		{
				$cikisdegistir=$db->prepare("UPDATE menu SET menu_durum=? where menu_url in('kullanici-profil.php','nadmin/cikis.php')");
				$cikisdegistir->execute(array(1));
				$girisdegistir=$db->prepare("UPDATE menu SET menu_durum=? where menu_url in('giris.php')");
				$girisdegistir->execute(array(0));
				$_SESSION["kullanici_id"]=$kullanici["kullanici_id"];
				if($kullanici["kullanici_yetki"]=="User")
				{
					header("Location:../../index.php");
				}
				else if($kullanici["kullanici_yetki"]=="Admin")
				{
					header("Location:../index.php");
				}
			}
			else{
				header("Location:../../giris.php?durum=no");
			}
		}
	}
	/*Kullanıcı Resmi Güncelle*/
	if (isset($_POST['kresimguncelle']))
	{
		$dosyaDizin="../../myimg/Kullanici/";
		$dosyaUzantisi=substr($_FILES["kullanici_profilresmi"]["name"], -4,4);
		$unique1=rand(20000,32000);
		$unique2=rand(20000,32000);
		$dosyaAdi=$unique1.$unique2.$dosyaUzantisi;
		$dosyaYolu=$dosyaDizin.$dosyaAdi;
		$tasi=move_uploaded_file($_FILES["kullanici_profilresmi"]["tmp_name"],$dosyaYolu);
		$kresimduzenle=$db->prepare("UPDATE kullanici SET kullanici_profilresmi=:resim WHERE kullanici_id=:id");
		$update=$kresimduzenle->execute(array('resim'=>substr($dosyaYolu,6),'id'=>$_POST['kullanici_id']));
		if($update)
		{
			$resimsilunlink=$_POST["eski_resimyol"];
			unlink("../../$resimsilunlink");
			header("Location:../kullanici-profil.php?profilresmi=true");
		}
		else
		{
			header("Location:../kullanici-profil.php?profilresmi=false");
		}
	}
	/*Kullanıcı Profil Guncelle*/
	if (isset($_POST['kullaniciprofilkaydet']))
	{
		if($_POST['kullanici_sifre']=="")
		{
			$kullaniciprofilkaydet=$db->prepare("UPDATE kullanici SET 
				kullanici_adsoyad=:adsoyad
				WHERE kullanici_id=:id");
			$update=$kullaniciprofilkaydet->execute(array(
				'adsoyad'=>$_POST['kullanici_adsoyad'],
				'id'=>$_POST["kullanici_id"]));
			if($update)
			{
				header("Location:../kullanici-profil.php?islem=true");
			}
			else{
				header("Location:../kullanici-profil.php?islem=false");
			}
		}
		else
		{
			$kullanicisifre=md5($_POST['kullanici_sifre']);
			$kullaniciprofilkaydet=$db->prepare("UPDATE kullanici SET 
				kullanici_adsoyad=:adsoyad,
				kullanici_sifre=:sifre
				WHERE kullanici_id=:id");
			$update=$kullaniciprofilkaydet->execute(array(
				'adsoyad'=>$_POST['kullanici_adsoyad'],
				'sifre'=>$kullanicisifre,
				'id'=>$_POST["kullanici_id"]));
			if($update)
			{
				header("Location:../kullanici-profil.php?islem=true");
			}
			else{
				header("Location:../kullanici-profil.php?islem=false");
			}
		}
	}
	/*Yorum Ekle*/
	if (isset($_POST["yorum-ekle"]))
	{
		if($_POST['kullanici_id']=="")
		{
			$kullaniciid=0;
			$tarih=date("d.m.Y H:i:s");
			$yorumolustur=$db->prepare("INSERT INTO yorum (yorum_icerik,yorum_eklenmetarihi,kullanici_id,haber_id,yorum_onay)
				VALUES (:icerik,:tarih,:kid,:hid,:onay)");
			$kayit=$yorumolustur->execute(array(	
				'icerik'=>$_POST['yorum_icerik'],
				'tarih'=>$tarih,
				'kid'=>$kullaniciid,
				'hid'=>$_POST['haber_id'],
				'onay'=>0
				));
			if($kayit)
			{
				header("Location:../../haber-detay.php?haber_id={$_POST['haber_id']}");
			}
			else{
				header("Location:../../haber-detay.php?haber_id={$_POST['haber_id']}");
			}
		}
		else
		{
			$tarih=date("d.m.Y H:i:s");
			$yorumolustur=$db->prepare("INSERT INTO yorum (yorum_icerik,yorum_eklenmetarihi,kullanici_id,haber_id,yorum_onay)
				VALUES (:icerik,:tarih,:kid,:hid,:onay)");
			$kayit=$yorumolustur->execute(array(	
				'icerik'=>$_POST['yorum_icerik'],
				'tarih'=>$tarih,
				'kid'=>$_POST['kullanici_id'],
				'hid'=>$_POST['haber_id'],
				'onay'=>0
				));
			if($kayit)
			{
				header("Location:../../haber-detay.php?haber_id={$_POST['haber_id']}");
			}
			else{
				header("Location:../../haber-detay.php?haber_id={$_POST['haber_id']}");
			}
		}
	}
	/*Yorum Sil*/
	if (@$_GET["yorumsil"]=="ok") {
		$sil=$db->prepare("DELETE FROM yorum where yorum_id=:id");
		$ok=$sil->execute(array("id"=>$_GET["yorum_id"]));
		if($ok)
		{
			header("Location:../yorum.php?islem=true");
		}
		else{
			header("Location:../yorum.php?islem=false");
		}
	}
	/*Yorum Onayla*/
	if (@$_GET["yorumaktif"]=="ok")
	{
		$yorum_id=$_GET["yorum_id"];
		$yorumonayla=$db->prepare("UPDATE yorum SET 
			yorum_onay=:onay
			WHERE yorum_id=:id");
		$update=$yorumonayla->execute(array(
			'onay'=>1,
			'id'=>$yorum_id));
		if($update)
		{
			header("Location:../yorum.php?islem=true");
		}
		else{
			header("Location:../yorum.php?islem=false");
		}
	}
	/*Mesaj Ekle*/
	if (isset($_POST["mesaj-ekle"]))
	{
		$tarih=date("d.m.Y H:i:s");
		$ad=$_POST['mesaj_ad'];
		$soyad=$_POST['mesaj_soyad'];
		$isim=$ad." ".$soyad;
		$mesajolustur=$db->prepare("INSERT INTO mesaj (mesaj_isim,mesaj_tel,mesaj_eposta,mesaj_icerik,mesaj_gonderilmetarihi,mesaj_konu)
			VALUES (:isim,:tel,:eposta,:icerik,:tarih,:konu)");
		$ekle=$mesajolustur->execute(array(	
			'isim'=>$isim,
			'konu'=>$_POST['mesaj_konu'],
			'tarih'=>$tarih,
			'icerik'=>$_POST['mesaj_icerik'],
			'tel'=>$_POST['mesaj_tel'],
			'eposta'=>$_POST['mesaj_eposta']
			));
		if($ekle)
		{
			header("Location:../../iletisim.php?durum=true");
		}
		else{
			header("Location:../../iletisim.php?durum=false");
		}
	}
	/*Mesaj Sil*/
	if (@$_GET["mesajsil"]=="ok") {
		$sil=$db->prepare("DELETE FROM mesaj where mesaj_id=:id");
		$ok=$sil->execute(array("id"=>$_GET["mesaj_id"]));
		if($ok)
		{
			header("Location:../mesaj.php?islem=true");
		}
		else{
			header("Location:../mesaj.php?islem=false");
		}
	}
	/*User Kullanıcı Resmi Güncelle*/
	if (isset($_POST['userkresmiguncelle']))
	{
		$dosyaDizin="../../myimg/Kullanici/";
		$dosyaUzantisi=substr($_FILES["kullanici_profilresmi"]["name"], -4,4);
		$unique1=rand(20000,32000);
		$unique2=rand(20000,32000);
		$dosyaAdi=$unique1.$unique2.$dosyaUzantisi;
		$dosyaYolu=$dosyaDizin.$dosyaAdi;
		$tasi=move_uploaded_file($_FILES["kullanici_profilresmi"]["tmp_name"],$dosyaYolu);
		$kresimduzenle=$db->prepare("UPDATE kullanici SET kullanici_profilresmi=:resim WHERE kullanici_id=:id");
		$update=$kresimduzenle->execute(array('resim'=>substr($dosyaYolu,6),'id'=>$_POST['kullanici_id']));
		if($update)
		{
			$resimsilunlink=$_POST["eski_resimyol"];
			unlink("../../$resimsilunlink");
			header("Location:../../kullanici-profil.php?profilresmi=true");
		}
		else
		{
			header("Location:../../kullanici-profil.php?profilresmi=false");
		}
	}
	/* User Kullanıcı Profil Guncelle*/
	if (isset($_POST['userprofilkaydet']))
	{
		if($_POST['kullanici_sifre']=="")
		{
			$kullaniciprofilkaydet=$db->prepare("UPDATE kullanici SET 
				kullanici_adsoyad=:adsoyad
				WHERE kullanici_id=:id");
			$update=$kullaniciprofilkaydet->execute(array(
				'adsoyad'=>$_POST['kullanici_adsoyad'],
				'id'=>$_POST["kullanici_id"]));
			if($update)
			{
				header("Location:../../kullanici-profil.php?islem=true");
			}
			else{
				header("Location:../../kullanici-profil.php?islem=false");
			}
		}
		else
		{
			$kullanicisifre=md5($_POST['kullanici_sifre']);
			$kullaniciprofilkaydet=$db->prepare("UPDATE kullanici SET 
				kullanici_adsoyad=:adsoyad,
				kullanici_sifre=:sifre
				WHERE kullanici_id=:id");
			$update=$kullaniciprofilkaydet->execute(array(
				'adsoyad'=>$_POST['kullanici_adsoyad'],
				'sifre'=>$kullanicisifre,
				'id'=>$_POST["kullanici_id"]));
			if($update)
			{
				header("Location:../../kullanici-profil.php?islem=true");
			}
			else{
				header("Location:../../kullanici-profil.php?islem=false");
			}
		}

	}
	?>