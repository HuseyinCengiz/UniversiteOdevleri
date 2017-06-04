/*********************************************************************** 
**                        SAKARYA ÜNİVERSİTESİ                        **
**             BİLGİSAYAR VE BİLİŞİM BİLİMLERİ FAKÜLTESİ              **
**                  BİLGİSAYAR MÜHENDİSLİĞİ BÖLÜMÜ                    **
**                 NESNEYE DAYALI PROGRAMLAMA DERSİ                   **
**                      2016-2017 BAHAR DÖNEMİ                        **
**    ÖDEV NUMARASI..........: 3                                      **
**    ÖĞRENCİ ADI............: Hüseyin Cengiz                         **
**    ÖĞRENCİ NUMARASI.......: B161210111                             **
**    DERSİN ALINDIĞI GRUP...: 1-B                                    **
***********************************************************************/
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    class program
    {
        static void Main(string[] args)
        {
            Isletme isletme = new Isletme();
            while (true)
            {
                try
                {
                    int secim = isletme.MenuSecim();
                    if (secim == 1)
                    {
                        isletme.TedarikciEkle();
                    }
                    else if (secim == 2)
                    {
                        isletme.TedarikciListele();
                    }
                    else if (secim == 3)
                    {
                        isletme.MusteriEkle();
                    }
                    else if (secim == 4)
                    {
                        isletme.MusteriListele();
                    }
                    else if (secim == 5)
                    {
                        isletme.HammaddeAl();
                    }
                    else if (secim == 6)
                    {
                        return;
                    }
                }
                catch (FormatException e)
                {
                    Console.WriteLine(e.Message);
                    Console.ReadKey();
                }
                catch (Hata h)
                {
                    h.Mesaj();
                    Console.ReadKey();
                }
                Console.Clear();
            }
        }
    }
}

