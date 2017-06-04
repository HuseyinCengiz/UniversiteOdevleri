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
   public class Urun:Hammadde
    {
        public Urun(int tdrkciid, int maddenumara):base(tdrkciid,maddenumara)
        {
            NihaiMamulAdi = "İşlenmiş " + MaddeAdi;
        }
        private string nihaiMamulAdi;
        public string NihaiMamulAdi { get { return nihaiMamulAdi; } set { nihaiMamulAdi = value; } }
    }
}
