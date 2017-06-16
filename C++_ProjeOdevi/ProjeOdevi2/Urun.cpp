#include"Urun.h"
#include"Kontrol.h"
#include<string>
#include<fstream>
const int genislik = 30;
string urunListesi[] = { "Ekran_karti","Ses_Karti","Islemci","Klavye","Fare","Monitor","Ram","Sabit_Disk","Hoparlor","SSD_Disk","Notebook","Kasa","Flash_Disk","Tablet","Cep_Telefonu","Kulaklik","Yazici","Scanner","Optik_Okuyucu","Tv_Karti" };
Urun::Urun()
{
	int urunindex = rand() % 20;//urunler listesindeki rastgele index degeri atiyor
	mUrunIsmý = urunListesi[urunindex];//urun isminede ratgele atanan sayinin urunlistesindeki verisi oluyor.
	mUrunKodu = UrunKoduUret();//urunkodu uret fonksiyonundan geri donen degeri esitliyoruz.
	mFiyat = 100 + rand() % 3000;//fiyata 100 ile 3100 arasinda sayi ataniyor.
}
string Urun::UrunKoduUret()//4 karakterli string bir kod olusturuyoruz.
{
	string kod = "";
	for (int i = 0; i < 4; i++)
	{
		kod += '1' + rand() % 10;
	}
	return kod;
}
string Urun::UrunisimGetir()//urun ismini donduruyoruz.
{
	return mUrunIsmý;
}
string Urun::UrunKodGetir()//urun kodunu donduruyoruz.
{
	return mUrunKodu;
}
int Urun::UrunFiyatGetir()//urun fiyat donduruyoruz.
{
	return mFiyat;
}
void Urun::Kaydet()
{
	fstream Kayit;
	Kayit.open("Urunler.txt", ios::out | ios::app);//kayiti yazma ve ekleme seklinde aciyoruz.
	if (Kayit.is_open())//kayit acikmi diye kontrol ettiriyoruz.
	{
		Kayit << UrunisimGetir() << " " << UrunKodGetir() << " " << UrunFiyatGetir() << endl;//kayita aktariyoruz.
	}
	Kayit.close();//kapatiyoruz.
}
void Urun::UrunListe()
{
	fstream kayit;
	kayit.open("Urunler.txt", ios::in);// kayiti okuma modunda aciyoruz.
	if (kayit.is_open())
	{
		string urunad, urunkod;
		int fiyat;
		Kontrol k;
		k.tavanCiz(genislik);//tablolari yazdiriyoruz.
		k.araCiz(genislik, "URUNLER LISTESI");
		while (kayit >> urunad >> urunkod >> fiyat)//burada eger kayit okunursa true oluyor ve kayit sayisi kadar donuyor.
		{
			k.ayracCiz(genislik);
			k.karakteryaz(urunad, urunkod, fiyat);//burda yazdiriyoruz.
		}
		k.ayracCiz(genislik);
		k.araCiz(genislik, "LISTE SONU");
		k.zeminCiz(genislik);
	}
	kayit.close();//kapatiyoruz.
}
void Urun::UrunSil(string kod)
{
	fstream kayit, gecici;
	kayit.open("Urunler.txt", ios::in);//okuma modunda urunler txt yi okuyoruz. 
	gecici.open("UrunGecici.txt", ios::out | ios::app);//yazma ve ekleme modunda gecici dosya aciyoruz.
	if (kayit.is_open())
	{
		string urunad, urunkod;
		int fiyat;
		while (kayit >> urunad >> urunkod >> fiyat)//eger urunler txtde kayit varsa kayit kadar donuyoruz.
		{
			if (urunkod != kod)//eger girdigimiz urun kodu okunan urun koduna esit degilse bu veri bizim silmek istmediðimiz veri ve bunu gecici dosyaya aktariyoruz.Eger silmek istedigimiz veri gelirse bir sey yapmiyor.Ve o veri geciciye eklenmiyor.
			{
				gecici << urunad << " " << urunkod << " " << fiyat << endl;
			}
		}
		kayit.close();
		gecici.close();//kapattiktan sonra
		remove("Urunler.txt");//urunleri kaldiriyoruz.
		rename("UrunGecici.txt", "Urunler.txt");//silinmesini istedigimiz verileri eklemedigimiz gecici dosyanin adini urunler yapipyoruz ve kayit silindi.
	}
}