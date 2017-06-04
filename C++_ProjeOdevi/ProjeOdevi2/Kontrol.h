#pragma once
#include<string>
using namespace std;
class Kontrol
{
public:

	void tavanCiz(int genislik);
	void zeminCiz(int genislik);
	void araCiz(int genislik, string yazi);
	void ayracCiz(int genislik);
	int  anaMenuCiz();
	void UrunEkleGoster(string, string, int);
	void MusteriEkleGoster(string, string, string, string, int, int, int);
	void araCizEkleUrun(int, string, string);
	void araCizEkleMusteri(int, string, string);
	void araCizEkleMusteri(int, string, int);
	void araCizEkleMusteri(int, string, int, int, int);
	void karakteryaz(string, string, string, string, string, string, string);
	void karakteryaz(string, string, int);
	void karakteryaz(string, string, string);
	int musteriMenuCiz();
	int yoneticiMenuCiz();
};
