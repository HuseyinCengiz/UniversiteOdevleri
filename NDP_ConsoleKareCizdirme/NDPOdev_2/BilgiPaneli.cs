/*********************************************************************** 
**                        SAKARYA ÜNİVERSİTESİ                        **
**             BİLGİSAYAR VE BİLİŞİM BİLİMLERİ FAKÜLTESİ              **
**                  BİLGİSAYAR MÜHENDİSLİĞİ BÖLÜMÜ                    **
**                 NESNEYE DAYALI PROGRAMLAMA DERSİ                   **
**                      2016-2017 BAHAR DÖNEMİ                        **
**    ÖDEV NUMARASI..........: 2                                      **
**    ÖĞRENCİ ADI............: Hüseyin Cengiz                         **
**    ÖĞRENCİ NUMARASI.......: B161210111                             **
**    DERSİN ALINDIĞI GRUP...: 1-B                                    **
***********************************************************************/
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NDPOdev_2
{
    class BilgiPaneli
    {
        public BilgiPaneli(int genislik, int yukseklik)//gerekli degerleri atadık
        {
            this.genislik = genislik;
            this.yukseklik = yukseklik;
            cizimAlani = new Dortgen();
            cizimAlani.RenkAta(ConsoleColor.DarkMagenta);
            cizimAlani.BoyutAta(this.genislik, this.yukseklik);
        }

        public void KonumAta(int x, int y)
        {
            this.x = x;
            this.y = y;
            cizimAlani.KonumAta(this.x, this.y);
        }//konum atadık
        public void Ciz()//cizdirdik
        {
            cizimAlani.RenkAta(ConsoleColor.Green);
            cizimAlani.TepeCiz();
            cizimAlani.DikeyCiz();
            cizimAlani.TabanCiz();
            cizimAlani.RenkAta(ConsoleColor.White);
            if (aktifSekil != null)
            {
                BilgiCiz();
            }
        }
        public void BilgiCiz()//bilgisini gosterecegimiz dortgenin icindeki bilgiyi gizdirdik
        {
            Console.SetCursorPosition(110, 18);
            Console.WriteLine("X..............:" + aktifSekil.X);
            Console.SetCursorPosition(110, 20);
            Console.WriteLine("Y..............:" + aktifSekil.Y);
            Console.SetCursorPosition(110, 22);
            Console.WriteLine("Genislik.......:" + aktifSekil.Genislik);
            Console.SetCursorPosition(110, 24);
            Console.WriteLine("Yukseklik......:" + aktifSekil.Yukseklik);
            Console.SetCursorPosition(110, 26);
            Console.WriteLine("Renk...........:" + aktifSekil.Renk);
        }

        public void SekilAta(Dortgen sekil)//bilgisini gosterecegimiz sekli atadik
        {
            aktifSekil = sekil;
        }

        private Dortgen aktifSekil;
        private Dortgen cizimAlani;
        private int genislik;
        private int yukseklik;
        private int x;
        private int y;
    }
}
