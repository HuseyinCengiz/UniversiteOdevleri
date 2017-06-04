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
    public class Barkod
    {
        public Barkod()
        {
            BarkodNo = RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(0, 9).ToString();
        }
        private string barkodNo;
        public string BarkodNo
        {
            get { return barkodNo; }
            set
            {
                if (value == null)
                    throw new Hata("Barkod No Null Olamaz...");
                else
                    barkodNo = value;
            }
        }
    }
}
