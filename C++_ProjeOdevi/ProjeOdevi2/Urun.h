#pragma once
#include<string>
using namespace std;
class Urun
{
public:
	Urun();
	string UrunisimGetir();
	string UrunKodGetir();
	string UrunKoduUret();
	int UrunFiyatGetir();
	void Kaydet();
	void UrunListe();
	void UrunSil(string);
private:
	string mUrunIsmý;
	string mUrunKodu;
	int mFiyat;


};