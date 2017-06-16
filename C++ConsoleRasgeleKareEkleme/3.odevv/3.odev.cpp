#include<iostream>
#include<Windows.h>
#include<ctime>
using namespace std;
const int MAX = 100;//hucreler dizisinin kac verisi olcagini belirliyoruz.
const int satir = 4;
const int sutun = 5;
enum  Renkler//yazilari cikartcagimiz renkleri enumla tanimliyoruz.
{
	LIGHTBLUE = 9,
	LIGHTGREEN = 10,
	LIGHTCYAN = 11,
	LIGHTRED = 12,
	LIGHTMAGENTA = 13,
	YELLOW = 14,
};

/*Burda hucreyi cizerken gerekli olan karakterler*/
char DUZCIZGI = 205;
char SOLUSTKOSE = 201;
char SAGUSTKOSE = 187;
char DIKEYCIZGI = 186;
char ASAGIAYRAC = 203;
char SOLALTKOSE = 200;
char SAGALTKOSE = 188;
char YUKARIAYRAC = 202;

void renkSec(int yazirenk)//enum renklerde tanimladigimiz renkleri alip yazilarin rengini belirliyoruz.
{
	int arkaplan = 0;
	int sonrenk = (16 * arkaplan) + yazirenk;
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), sonrenk);
}
void karaktercikar(int renk, char karakter)//burada renkli karakterleri basmamizi yarayacak fonksiyonu yaziyoruz.
{
	renkSec(renk);
	cout << karakter;
	renkSec(15);
}
void sayiyaz(int renk, int sayi)//burada renkli sayi basmamizi yarayacak fonksiyonu yaziyoruz.
{
	renkSec(renk);
	cout << sayi;
	renkSec(15);
}

class Hucre//bu classda hucrelerin icinde cikartcagimiz karakter renk ve sayiyi tanimliyoruz.
{
public:
	Hucre();
	int karakter;
	int renk;
	int adet;

};
Hucre::Hucre()//Hucre constructorý ile her hucre olustugunda rastgele A'dan Z'ye kadar karakter 0'dan 9'a kadar sayilari ve rastgele renk degerleri atiyoruz.
{
	karakter = 65 + rand() % 26;
	adet = rand() % 10;
	renk = 9 + rand() % 6;
}
class Dizi
{
public:
	Dizi()//Hucre olustugunda sifir degeri atiyoruz.
	{
		HucreSayisi = 0;
	}

	int HucreEkle()
	{
		return ++HucreSayisi;//Hucre eklendiðinde hucresayisini arttiriyoruz.
	}
	int HucreCikar()//Hucre eklendiðinde hucresayisini cikartiyoruz.
	{
		return --HucreSayisi;
	}
	void yerdegistir(int, int, int);//bildirim yapiyoruz.
	void Ciz(int);
private:
	int HucreSayisi;
	Hucre hucreler[MAX];//dizi classinin icinde hucre dizisi tanimliyoruz.
};
void Dizi::yerdegistir(int sonrakidrm, int hucresayi, int durum)//mainden gonderilen veriye gore dizilerin yerini degistiriyoruz.
{
	if (durum == 0)//eger 0 gelirse yeni eklenen hucreyi sonraki duruma gore oraya oteliyoruz.
	{
		Hucre temp;
		for (int i = hucresayi; i > sonrakidrm; i--)
		{
			temp = hucreler[i - 1];//burdada degistirmeleri yapýyoruz.
			hucreler[i - 1] = hucreler[i];
			hucreler[i] = temp;
		}
	}
	if (durum == 1)//eger 1 gelirse cikarilcak hucreyi yazdirilmayacak diziye atiyoruz.
	{
		Hucre temp;
		for (int i = sonrakidrm; i < hucresayi; i++)
		{
			temp = hucreler[i];//burdada degistirmeleri yapiyoruz.
			hucreler[i] = hucreler[i + 1];
			hucreler[i + 1] = temp;
		}
	}

}
void Dizi::Ciz(int hucresayisi)//dizinin icinde olan ciz fonksiyonunu kapsam cozunurluk ile tanýmlýyoruz ve hucre sayisina gore yazdirma islemini yapiyoruz.
{
	HucreSayisi = hucresayisi;
	int satir = 4;
	for (int j = 0; j < satir; j++)
	{
		for (int k = 0; k < HucreSayisi; k++)
		{
			if (j == 0) //1.satirda ust kismi yazdiriyoruz.
			{
				if (k == 0)//birinci hucrede sol tarafý koseli yapiyoruz.
				{
					cout << SOLUSTKOSE << DUZCIZGI << DUZCIZGI << DUZCIZGI << ASAGIAYRAC;
				}
				else if (k == (HucreSayisi - 1))//son hucrede sag tarafi koseli yapiyoruz.
				{
					cout << DUZCIZGI << DUZCIZGI << DUZCIZGI << SAGUSTKOSE;
				}
				else//ortada sadece cizgiler yapiyoruz.
				{
					cout << DUZCIZGI << DUZCIZGI << DUZCIZGI << ASAGIAYRAC;
				}

			}

			if (j == 1)//burasida ayni mantik rastgele sayi yazdiriyoruz.
			{
				if (k == 0)
				{
					cout << DIKEYCIZGI;
					cout << " ";
					sayiyaz(hucreler[k].renk, hucreler[k].adet);
					cout << " ";
					cout << DIKEYCIZGI;
				}
				else if (k == (HucreSayisi - 1))
				{
					cout << " ";
					sayiyaz(hucreler[k].renk, hucreler[k].adet);
					cout << " ";
					cout << DIKEYCIZGI;
				}
				else
				{
					cout << " ";
					sayiyaz(hucreler[k].renk, hucreler[k].adet);
					cout << " ";
					cout << DIKEYCIZGI;
				}
			}
			if (j == 2)//burasida ayni mantik yine rastgele karakter cikartiyoruz.
			{
				if (k == 0)
				{
					cout << DIKEYCIZGI;
					cout << " ";
					karaktercikar(hucreler[k].renk, hucreler[k].karakter);
					cout << " ";
					cout << DIKEYCIZGI;
				}
				else if (k == (HucreSayisi - 1))
				{
					cout << " ";
					karaktercikar(hucreler[k].renk, hucreler[k].karakter);
					cout << " ";
					cout << DIKEYCIZGI;
				}
				else
				{
					cout << " ";
					karaktercikar(hucreler[k].renk, hucreler[k].karakter);
					cout << " ";
					cout << DIKEYCIZGI;
				}
			}
			if (j == 3)  // 3.satirda alt kismi yazdiriyoruz.
			{
				if (k == 0) //birinci hucrede sol tarafý koseli yapiyoruz.
				{
					cout << SOLALTKOSE << DUZCIZGI << DUZCIZGI << DUZCIZGI << YUKARIAYRAC;
				}
				else if (k == (HucreSayisi - 1)) //son hucrede sag tarafi koseli yapiyoruz.
				{
					cout << DUZCIZGI << DUZCIZGI << DUZCIZGI << SAGALTKOSE;
				}//ortada sadece cizgiler yapiyoruz.
				else
					cout << DUZCIZGI << DUZCIZGI << DUZCIZGI << YUKARIAYRAC;
			}

		}cout << endl;
	}
}
int main()
{
	srand(time(NULL));
	int varsayilandeger = 2 + rand() % 10;//ilk basta kac hucre olusturcagini rastgele buraya atiyoruz. 
	int sonrakidurum;
	Dizi hucreolustur;//dizimizi olusturuyoruz.
	hucreolustur.Ciz(varsayilandeger);//ciz fonksiyonuna kac hucre olusturacagimizi atiyoruz.
	cout << endl;
	int secim = 0;
	do
	{
		cout << "1.Ekle" << endl;
		cout << "2.Cikar" << endl;
		cout << "3.Programdan Cik" << endl;
		cin >> secim;
		if (secim == 1)//eger secim 1 olursa hucre ekletiyoruz.
		{
			cout << "Onceki Durum" << endl;
			hucreolustur.Ciz(varsayilandeger);//onceki hucreleri yazdiriyoruz.
			sonrakidurum = rand() % varsayilandeger;//yeni gelen hucrenin hucrelerin neresine gelecegini random sayi atarak belirliyoruz. 
			varsayilandeger++;//varsayilan degeri arttirip yeni hucre eklettiriyoruz.
			cout << "Sonraki Durum :" << sonrakidurum << endl;
			hucreolustur.yerdegistir(sonrakidurum, varsayilandeger, 0);//burdada sonrakiduruma gore hucrenin nereye yerlescegini ayarliyoruz.Burda ücüncü degiskene 0 gonderirsem o sayiya gore yerdegistir fonksiyonunda istedigimiz durumu yapar.
			hucreolustur.Ciz(hucreolustur.HucreEkle());//yeni diziyi yazdiriyoruz.
			system("pause");
			system("cls");//pause dan sonra ekrani slip yeni diziyi yazdiririyoruz.
			hucreolustur.Ciz(varsayilandeger);
		}
		if (secim == 2)//eger secim 2 olursa hucre cikartiyoruz.
		{
			cout << "Onceki Durum" << endl;
			hucreolustur.Ciz(varsayilandeger);//onceki hucreleri yazdiriyoruz.
			sonrakidurum = rand() % varsayilandeger;//cikartilacak hucrenin  hucrelerin neresinden cikartilacagini random sayi atarak belirliyoruz. 
			varsayilandeger--;//varsayilan degeri azaltip hucre siliyoruz.
			cout << "Sonraki Durum :" << sonrakidurum << endl;
			hucreolustur.yerdegistir(sonrakidurum, varsayilandeger, 1);//burdada sonrakiduruma gore hucrenin nereden cikartilacagini ayarliyoruz.Burda ücüncü degiskene 1 gonderirsem o sayiya gore yerdegistir fonksiyonunda istedigimiz durumu yapar.
			hucreolustur.Ciz(hucreolustur.HucreCikar());//yeni diziyi yazdiriyoruz.
			system("pause");//pause dan sonra ekrani slip yeni diziyi yazdiririyoruz.
			system("cls");
			hucreolustur.Ciz(varsayilandeger);
		}
	} while (secim != 3);
	system("pause");
}