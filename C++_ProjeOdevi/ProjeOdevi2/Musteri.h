#pragma once
#include<iostream>
#include "Tarih.h"
#include<string>
using namespace std;
class Musteri
{
private:
	std::string mIsim;
	std::string mSoyisim;
	std::string mTelno;
	std::string mTcno;
	Tarih mDogumTarihi;
public:
	Musteri();
	std::string tcnoGetir();
	std::string telnoGetir();
	std::string isimGetir();
	std::string soyisimGetir();
	Tarih tarihGetir();
	string tcnoUret();
	string telnoUret();
	void Kaydet();
	void MusteriListe();
	void MusteriSil(string);
};
