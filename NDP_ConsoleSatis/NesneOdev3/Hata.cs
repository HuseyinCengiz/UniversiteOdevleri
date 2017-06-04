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
    public class Hata : Exception
    {
        //Exception Sınıfından kalıtım aldım ve kendi hatamı constructur yardımıyla  ekrana bastırıyorum.
        public Hata(string mesaj):base(mesaj){}
        public void Mesaj()
        {
            Console.WriteLine(Message);
        }
    }
}
