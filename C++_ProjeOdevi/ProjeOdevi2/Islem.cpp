#include"Islem.h"
#include"Kontrol.h"
#include<fstream>
const int genislik = 30;
Islem::Islem()
{
	mIslemKodu = islemKoduUret();//constructor ile islem koduna deger atiyoruz.
}
string Islem::islemKoduUret()//4 karakterli islemkodu olusturuyoruz
{
	string islemkod = "";
	for (int i = 0; i < 4; i++)
	{
		islemkod += '1' + rand() % 10;
	}
	return islemkod;
}
string Islem::islemKoduGetir()//islem kodu donduruyoruz.
{
	return mIslemKodu;
}
string Islem::tcNoGetir()//tc no donduruyoruz.
{
	return mMusteriTcNo;
}
string Islem::urunKoduGetir()//urun kodunu donduruyoruz.
{
	return mUrunKodu;
}
void Islem::tcNoAta(string tc)//tc no atiyoruz.
{
	mMusteriTcNo = tc;
}
void Islem::urunKoduAta(string urunkod)//urun kodu atiyoruz
{
	mUrunKodu = urunkod;
}
void Islem::kaydet()
{
	fstream kayit;
	kayit.open("Islemler.txt", ios::out | ios::app);//kayiti yazma ve ekleme seklinde aciyoruz.
	if (kayit.is_open())//kayit acikmi diye kontrol ettiriyoruz.
	{
		kayit << islemKoduGetir() << " " << urunKoduGetir() << " " << tcNoGetir() << endl;//kayita aktariyoruz.
	}
	kayit.close();//kapatiyoruz.
}
void Islem::IslemListele(string tc)
{
	fstream kayit;
	kayit.open("Islemler.txt", ios::in);// kayiti okuma modunda aciyoruz.
	if (kayit.is_open())
	{
		string islemkod, urunkod, musteritc;
		Kontrol k;
		k.tavanCiz(genislik);//tablolari yazdiriyoruz.
		k.araCiz(genislik, "ISLEMLER LISTESI");
		while (kayit >> islemkod >> urunkod >> musteritc)//burada eger kayit okunursa true oluyor ve kayit sayisi kadar donuyor.
		{
			if (musteritc == tc)//burda tc nosunu girdigimiz kisinin tcsi esitse yazdiriyoruz.
			{
				k.ayracCiz(genislik);
				k.karakteryaz(islemkod, urunkod, musteritc);//burda yazdiriyoruz.
			}
		}
		k.ayracCiz(genislik);
		k.araCiz(genislik, "LISTE SONU");
		k.zeminCiz(genislik);
	}
	kayit.close();//kapatiyoruz.
}
void Islem::IslemSil(string tc)
{
	fstream kayit, gecici;
	kayit.open("Islemler.txt", ios::in);//okuma modunda islemler txt yi okuyoruz. 
	gecici.open("IslemGecici.txt", ios::out | ios::app);//yazma ve ekleme modunda gecici dosya aciyoruz.
	if (kayit.is_open())
	{
		string islemkod, urunkod, musteritc;
		while (kayit >> islemkod >> urunkod >> musteritc)//eger islemler txtde kayit varsa kayit kadar donuyoruz.
		{
			if (musteritc != tc)
			{
				gecici << islemkod << " " << urunkod << " " << musteritc << endl;//eger girdigimiz tc okunan tcye esit degilse bu veri bizim silmek istmediðimiz veri ve bunu gecici dosyaya aktariyoruz.Eger silmek istedigimiz veri gelirse bir sey yapmiyor.Ve o veri geciciye eklenmiyor.
			}
		}
	}
	kayit.close();
	gecici.close();//kapattiktan sonra
	remove("Islemler.txt");//islemleri kaldiriyoruz.
	rename("IslemGecici.txt", "Islemler.txt");//silinmesini istedigimiz verileri eklemedigimiz gecici dosyanin adini islemler yapiyoruz ve kayit silindi.
}