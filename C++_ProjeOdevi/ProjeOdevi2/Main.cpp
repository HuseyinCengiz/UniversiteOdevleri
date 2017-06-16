#include "Musteri.h"
#include"Urun.h"
#include"Islem.h"
#include "Kontrol.h"
#include<iostream> 
#include<string>
#include<ctime>
using namespace std;
int main()
{
	srand(time(NULL));
	do
	{
	a:
		Kontrol kontrol;
		int secim = 0;
		secim = kontrol.anaMenuCiz();//menu cizdiriyoruz orda bir secim alip secime aktariyorum
		if (secim == 1)//eger secim 1 ise musteri panelini yazdiriyorum.
		{
			Musteri musteri;
			musteri.MusteriListe();
			string tc = "";
			cout << "Tc No Gir: ";
			cin >> tc;
			int secim2 = 0;
			secim2 = kontrol.musteriMenuCiz();//musteri panelini yazdirdiktan sonra secim alip musteri panelindekileri sectiriyorum.
			if (secim2 == 1)
			{
				string urunkod = "";
				Urun urun;
				urun.UrunListe();//urunleri listeliyorum
				cout << "Urun Kodu Gir:";
				cin >> urunkod;
				Islem islem;//islemi yapan musterinin tcsini giriyorum
				islem.tcNoAta(tc);
				islem.urunKoduAta(urunkod);//alacagimiz urunun kodunu giriyorum
				islem.kaydet();//islemleri kayit ettiriyorum.
			}
			if (secim2 == 2)//tcye gore musterinin islemleri listeliyorum.
			{
				Islem islem;
				islem.IslemListele(tc);
			}
			if (secim2 == 3)//tcye gore islemleri siliyorum.
			{
				Islem islem;
				islem.IslemSil(tc);
			}
			if (secim2 == 4)//secim 4 ise islemi goto ile yukari gonderiyorum.
			{
				system("cls");
				goto a;
			}
		}
		if (secim == 2)//eger secim 2 ise yonetici paneli yazdiriyorum.
		{
			int secim2 = 0;
			secim2 = kontrol.yoneticiMenuCiz();//yonetici menuyu yazdiriyorum burda yoneticiden secim aliyorum.
			if (secim2 == 1)//eger secim 1 ise rastgele musteri ekliyorum
			{
				Musteri musteri;
				kontrol.MusteriEkleGoster(musteri.isimGetir(), musteri.soyisimGetir(), musteri.tcnoGetir(), musteri.telnoGetir(), musteri.tarihGetir().gunGetir(), musteri.tarihGetir().ayGetir(), musteri.tarihGetir().yilGetir());
				musteri.Kaydet();
			}
			if (secim2 == 2)//musteri listeliyorum.
			{
				Musteri musteri;
				musteri.MusteriListe();
			}
			if (secim2 == 3)//musteri listeletip silmek istedigim tcyi aliyorum ve musteri siliyorum.
			{
				string tc = "";
				Musteri musteri;
				musteri.MusteriListe();
				cout << "Tcno gir:";
				cin >> tc;
				musteri.MusteriSil(tc);
			}
			if (secim2 == 4)//rastgele urun ekletiyorum
			{
				Urun urun;
				kontrol.UrunEkleGoster(urun.UrunisimGetir(), urun.UrunKodGetir(), urun.UrunFiyatGetir());
				urun.Kaydet();
			}
			if (secim2 == 5)//urun listeletiyorum
			{
				Urun urun;
				urun.UrunListe();
			}
			if (secim2 == 6)//urunu listeletip silmek istedigim urunun kodunu alýyorum.
			{
				string urunkod = "";
				Urun urun;
				urun.UrunListe();
				cout << "Urun kod gir:";
				cin >> urunkod;
				urun.UrunSil(urunkod);
			}
		}
		if (secim == 3)//eger secim 3 ise kapatiyorum.
		{
			return 0;
		}
		system("pause");
		system("cls");
	} while (true);//sonsuz bir dongude secimleri aliyorum.


}