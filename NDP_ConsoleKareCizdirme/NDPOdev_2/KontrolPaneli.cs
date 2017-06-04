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
    class KontrolPaneli
    {
        public KontrolPaneli(int genislik, int yukseklik)//gerekli degerleri atadık ve cizecegimiz dortgeni olusturduk
        {
            this.genislik = genislik;
            this.yukseklik = yukseklik;
            cizimAlani = new Dortgen();
            cizimAlani.RenkAta(ConsoleColor.Yellow);
            cizimAlani.BoyutAta(this.genislik, this.yukseklik);
        }
        public void Ciz()//cizdirdik
        {
            cizimAlani.RenkAta(ConsoleColor.Cyan);
            cizimAlani.TepeCiz();
            cizimAlani.DikeyCiz();
            cizimAlani.TabanCiz();
            cizimAlani.RenkAta(ConsoleColor.White);
            MenuCiz();
        }
        public void KonumAta(int x, int y)//konum atadık
        {
            this.x = x;
            this.y = y;
            cizimAlani.KonumAta(this.x, this.y);
        }
        public void MenuCiz()//kontrol panelini yazdırdık
        {
            Console.SetCursorPosition(110, 1);
            Console.WriteLine("KONTROL PANELİ");
            Console.SetCursorPosition(110, 3);
            Console.WriteLine("ŞEKİL EKLE(E)");
            Console.SetCursorPosition(110, 5);
            Console.WriteLine("SOLA OTELE(A)");
            Console.SetCursorPosition(110, 7);
            Console.WriteLine("SAGA OTELE(D)");
            Console.SetCursorPosition(110, 9);
            Console.WriteLine("YUKARI OTELE(W)");
            Console.SetCursorPosition(110, 11);
            Console.WriteLine("ASAGI OTELE(S)");
        }
        private int genislik;
        private int yukseklik;
        private int x;
        private int y;
        private Dortgen cizimAlani;
    }
}
