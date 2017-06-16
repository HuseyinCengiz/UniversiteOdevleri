#include<iostream>
#include"Tarih.h"
using namespace std;
Tarih::Tarih()
{
	gun = 1 + rand() % 31;// gune 1 ile 31 arasinda deger atiyoruz.
	ay = 1 + rand() % 12;// aya 1 ile 12 arasında deger atiyoruz.
	yil = 1930 + rand() % 87;//yila 1930 ile 2016 arasinda deger atıyoruz.
}
int Tarih::yilGetir()//yili donduruyoruz.
{
	return yil;
}
int Tarih::ayGetir()//ayi donduruyoruz.
{
	return ay;
}
int Tarih::gunGetir()//gunu donduruyoruz.
{
	return gun;
}
