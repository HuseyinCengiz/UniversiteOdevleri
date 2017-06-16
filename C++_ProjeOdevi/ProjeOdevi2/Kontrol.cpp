#include "Kontrol.h"
#include <iostream>
#include<iomanip>
#include<Windows.h>
using namespace std;

char DUZCIZGI = 205;
char SOLUSTKOSE = 201;
char SAGUSTKOSE = 187;
char DIKEYCIZGI = 186;
char ASAGIAYRAC = 203;
char SOLALTKOSE = 200;
char SAGALTKOSE = 188;
char YUKARIAYRAC = 202;
char YATAYSAGAAYRAC = 204;
char YATAYSOLAAYRAC = 185;

enum RENKLER
{
	BLACK = 0,
	BLUE = 1,
	GREEN = 2,
	CYAN = 3,
	RED = 4,
	MAGENTA = 5,
	BROWN = 6,
	LIGHTGRAY = 7,
	DARKGRAY = 8,
	LIGHTBLUE = 9,
	LIGHTGREEN = 10,
	LIGHTCYAN = 11,
	LIGHTRED = 12,
	LIGHTMAGENTA = 13,
	YELLOW = 14,
	WHITE = 15
};
void renkAta(int yazirenk)//renk atiyoruz.
{
	int arkaplan = 0;

	int sonRenk;

	sonRenk = (16 * arkaplan) + yazirenk;

	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), sonRenk);
}
void karakterCikar(char karakter, RENKLER renk)//renkli yazdiriyoruz.
{
	renkAta(renk);
	cout << karakter;
	renkAta(WHITE);
}
void Kontrol::tavanCiz(int genislik)//tablonun tavan kismini yazdiriyoruz.
{
	karakterCikar(SOLUSTKOSE, GREEN);
	for (int i = 0; i < genislik; i++)
		karakterCikar(DUZCIZGI, GREEN);
	karakterCikar(SAGUSTKOSE, GREEN);
	cout << endl;
}
void Kontrol::zeminCiz(int genislik)//tablonun zemin kismini yazdiriyoruz.
{
	karakterCikar(SOLALTKOSE, GREEN);
	for (int i = 0; i < genislik; i++)
		karakterCikar(DUZCIZGI, GREEN);
	karakterCikar(SAGALTKOSE, GREEN);
	cout << endl;
}
void Kontrol::araCiz(int genislik, string yazi)//tablonun arasini ciziyoruz ve yazi yazdiriyoruz.
{
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << std::left << setw(genislik) << yazi;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::araCizEkleMusteri(int genislik, string baslik, string yazi)//musteri ekledikten sonra eklenen urunleri gosteriyoruz.
{
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << std::left << setw(10) << baslik << setw(genislik - 10) << yazi;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::araCizEkleMusteri(int genislik, string baslik, int sayi)//musteri eklenin overload edilmis hali musteri ekledikten sonra eklenen urunleri gosteriyoruz.
{
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << std::left << setw(10) << baslik << setw(genislik - 10) << sayi;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::araCizEkleUrun(int genislik, string baslik, string yazi)//urun ekledikten sonra eklenen urunleri gosteriyoruz.
{
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << std::left << setw(10) << baslik << setw(genislik - 10) << yazi;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::araCizEkleMusteri(int genislik, string baslik, int gun, int ay, int yil)//musteri ekleyi tarih icin overload ettim.
{
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << std::left << setw(10) << baslik << setw(2) << gun << setw(1) << "/" << setw(2) << ay << setw(1) << "/" << setw(5) << yil << right << setw(10);
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::ayracCiz(int genislik)// tablonun ayrac kismini yazdiriyoruz.
{
	karakterCikar(YATAYSAGAAYRAC, GREEN);
	for (int i = 0; i < genislik; i++)
		karakterCikar(DUZCIZGI, GREEN);
	karakterCikar(YATAYSOLAAYRAC, GREEN);
	cout << endl;
}
int Kontrol::anaMenuCiz()//anamenuyu cizdiriyoruz.
{
	int secim = 0;
	tavanCiz(30);
	araCiz(30, "ANA KONTROL PANELI");
	ayracCiz(30);
	araCiz(30, "1.Musteri Paneli");
	araCiz(30, "2.Yonetici Paneli");
	araCiz(30, "3.Cikis");
	zeminCiz(30);
	cout << "Secim: ";
	cin >> secim;
	return secim;
}
void Kontrol::karakteryaz(string urunad, string urunkod, int fiyat)//tablodaki verilerin gosterildigi yeri yazdiriyoruz.
{
	renkAta(GREEN);
	karakterCikar(DIKEYCIZGI, GREEN);
	renkAta(WHITE);
	cout << setw(7) << urunkod << setw(18) << urunad << setw(5) << fiyat;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::karakteryaz(string islemkod, string urunkod, string musteritc)//tablodaki verilerin gosterildigi yerin overload edilmiþ hali
{
	renkAta(GREEN);
	karakterCikar(DIKEYCIZGI, GREEN);
	renkAta(WHITE);
	cout << setw(10) << islemkod << setw(10) << urunkod << setw(10) << musteritc;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
void Kontrol::karakteryaz(string ad, string soyad, string tc, string tel, string gun, string ay, string yil)//tablodaki verilerin gosterildigi yerin overload edilmiþ hali
{
	renkAta(GREEN);
	karakterCikar(DIKEYCIZGI, GREEN);
	renkAta(WHITE);
	cout << setw(10) << ad << setw(10) << soyad << setw(6) << tc << setw(10) << tel << setw(2) << "  " << setw(2) << gun << setw(1) << "/" << setw(2) << ay << setw(1) << "/" << setw(6) << yil;
	karakterCikar(DIKEYCIZGI, GREEN);
	cout << endl;
}
int Kontrol::musteriMenuCiz()//musteri menusunu yazdiriyoruz.
{
	int secim = 0;
	tavanCiz(30);
	araCiz(30, "MUSTERI PANELI");
	ayracCiz(30);
	araCiz(30, "1.Urun Al");
	araCiz(30, "2.Islemleri Listele");
	araCiz(30, "3.Islem Sil");
	araCiz(30, "4.Geri");
	zeminCiz(30);
	cout << "Secim: ";
	cin >> secim;
	return secim;
}
int Kontrol::yoneticiMenuCiz()//yonetici menuyu cizdiriyoruz.
{
	int secim = 0;
	tavanCiz(30);
	araCiz(30, "YONETICI PANELI");
	ayracCiz(30);
	araCiz(30, "1.Musteri Ekle");
	araCiz(30, "2.Musteri Listele");
	araCiz(30, "3.Musteri Sil");
	araCiz(30, "4.Urun Ekle");
	araCiz(30, "5.Urun Listele");
	araCiz(30, "6.Urun Sil");
	zeminCiz(30);
	cout << "Secim: ";
	cin >> secim;
	return secim;
}
void Kontrol::UrunEkleGoster(string urunadi, string urunkodu, int fiyat)//eklenen urunu tablo seklinde gosteriyoruz.
{
	tavanCiz(30);
	araCiz(30, "EKLENEN URUN");
	ayracCiz(30);
	araCizEkleMusteri(30, "Urun Adi.:", urunadi);
	araCizEkleMusteri(30, "Urun Kodu:", urunkodu);
	araCizEkleMusteri(30, "Fiyat....:", fiyat);
	zeminCiz(30);
}
void Kontrol::MusteriEkleGoster(string ad, string soyad, string tc, string tel, int gun, int ay, int yil)//eklenen mustriyi tablo seklinde gosteriyoruz.
{
	tavanCiz(30);
	araCiz(30, "EKLENEN MUSTERI");
	ayracCiz(30);
	araCizEkleMusteri(30, "Isim....:", ad);
	araCizEkleMusteri(30, "Soyisim.:", soyad);
	araCizEkleMusteri(30, "Tcno....:", tc);
	araCizEkleMusteri(30, "Telno...:", tel);
	araCizEkleMusteri(30, "D.Tarihi:", gun, ay, yil);
	zeminCiz(30);
}