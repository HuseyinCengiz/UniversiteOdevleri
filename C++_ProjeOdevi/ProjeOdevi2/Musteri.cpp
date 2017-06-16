#include"Musteri.h"
#include"Kontrol.h"
#include<fstream>
const int genislik = 50;
string isimlerListesi[] = { "Ahmet","Osman","Ali","Mehmet","Veli","Sarp","Emrah","Eser","Erbil","Oguz","Can","Murat","Sinan","Mert","Mete","Sait","Huseyin","Cihat","Orhan","Fatih","Ahu","Binnur","Bilge","Candan","Cahide","Demet","Deste","Gizem","Ece","Elanur","Fatma","Fidan","Gamze","Hale","Hilal","Irmak","Jale","Kader","Kamile","Lale" };
string soyisimlerListesi[] = { "KANDEMIR","ORHON","VURAL","YAVUZ","UZ","ERDEM","DEDE","UYANIK","ASLAN","ERKURAN","ER","DAL","KARAKUM","YILMAZ","TAHTACI","KAYA","ERGE","ONUK","TOPAL","BEDER" };
string Musteri::tcnoUret()//4 karakterli tcno uretiyoruz.
{
	string tc = "";
	for (int i = 0; i < 4; i++)
	{
		tc += '1' + rand() % 10;
	}
	return tc;
}
string Musteri::telnoUret()//10 karakterli tel no uretiyoruz.
{
	string tel = "";
	for (int i = 0; i < 10; i++)
	{
		tel += '0' + rand() % 10;
	}
	return tel;
}
Musteri::Musteri()
{
	int isimIndex = rand() % 40;
	int SoyisimIndex = rand() % 20;
	mIsim = isimlerListesi[isimIndex];
	mSoyisim = soyisimlerListesi[SoyisimIndex];
	mTelno = telnoUret();
	mTcno = tcnoUret();
}
std::string Musteri::tcnoGetir()//tcno donduruyoruz.
{
	return mTcno;
}
std::string Musteri::telnoGetir()//telno getiriyoruz.
{
	return mTelno;
}
std::string Musteri::isimGetir()//isim donduruyoruz.
{
	return mIsim;
}
std::string Musteri::soyisimGetir()//soyisim donduruyoruz.
{
	return mSoyisim;
}
Tarih Musteri::tarihGetir()//tarih donduruyoruz.
{
	return mDogumTarihi;
}
void Musteri::Kaydet()
{
	fstream kayit;
	kayit.open("Musteriler.txt", ios::out | ios::app);//kayiti yazma ve ekleme seklinde aciyoruz.
	if (kayit.is_open() == true)//kayit acikmi diye kontrol ettiriyoruz.
	{
		kayit << isimGetir() << " " << soyisimGetir() << " " << tcnoGetir() << " " << telnoGetir() << " " << tarihGetir().gunGetir() << " " << tarihGetir().ayGetir() << " " << tarihGetir().yilGetir() << endl;//kayita aktariyoruz.
	}
	kayit.close();//kapatiyoruz.
}
void Musteri::MusteriListe()
{
	fstream kayit;
	kayit.open("Musteriler.txt", ios::in);// kayiti okuma modunda aciyoruz.
	if (kayit.is_open())
	{
		string ad, soyad, tcno, telno, gun, ay, yil;
		Kontrol k;
		k.tavanCiz(genislik);//tablolari yazdiriyoruz.
		k.araCiz(genislik, "MUSTERILER LISTESI");
		while (kayit >> ad >> soyad >> tcno >> telno >> gun >> ay >> yil)//burada eger kayit okunursa true oluyor ve kayit sayisi kadar donuyor.
		{
			k.ayracCiz(genislik);
			k.karakteryaz(ad, soyad, tcno, telno, gun, ay, yil);//burda yazdiriyoruz.
		}
		k.ayracCiz(genislik);
		k.araCiz(genislik, "LISTE SONU");
		k.zeminCiz(genislik);
	}
	kayit.close();//kapatiyoruz.
}
void Musteri::MusteriSil(string tc)
{
	fstream kayit, gecici;
	kayit.open("Musteriler.txt", ios::in);//okuma modunda musteriler txt yi okuyoruz. 
	gecici.open("MusteriGecici.txt", ios::out | ios::app);//yazma ve ekleme modunda gecici dosya aciyoruz.
	if (kayit.is_open())
	{
		string ad, soyad, tcno, telno, gun, ay, yil;
		while (kayit >> ad >> soyad >> tcno >> telno >> gun >> ay >> yil)//eger musteriler txtde kayit varsa kayit kadar donuyoruz.
		{
			if (tcno != tc)
			{
				gecici << ad << " " << soyad << " " << tcno << " " << telno << " " << gun << " " << ay << " " << yil << endl;//eger girdigimiz tc okunan tcye esit degilse bu veri bizim silmek istmediðimiz veri ve bunu gecici dosyaya aktariyoruz.Eger silmek istedigimiz veri gelirse bir sey yapmiyor.Ve o veri geciciye eklenmiyor.
			}
		}
	}
	kayit.close();
	gecici.close();//kapattiktan sonra
	remove("Musteriler.txt");//musteriler kaldiriyoruz.
	rename("MusteriGecici.txt", "Musteriler.txt");//silinmesini istedigimiz verileri eklemedigimiz gecici dosyanin adini islemler yapiyoruz ve kayit silindi.
}