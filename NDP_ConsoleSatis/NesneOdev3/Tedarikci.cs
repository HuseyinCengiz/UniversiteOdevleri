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
    public class Tedarikci:Kisi
    {
        string[] isimler = { "Hüseyin", "Kerem", "Fatih", "Harun", "Şamil", "Enes", "Ferhat", "Nihat", "Şahin", "Emre", "Emrah", "Bekir", "Ayşe", "Fatma", "Derya", "Sude", "Duygu", "Hilal", "Hülya", "Sıla", "Selva", "Kübra", "Büşra", "Tuğba", "Hande", "Tolga", "Mert", "Hakkı", "Yasin" };
        string[] adres = { "İstanbul", "Ankara", "Sinop", "İzmir", "Van", "Antalya", "Kocaeli", "Sakarya", "Edirne", "Samsun", "Trabzon", "Giresun", "Çanakkale" };
        string[] TelBaslangic = { "0531", "0532", "0535", "0542", "0541", "0530", "0536" };
        string[] mailuzanti = { "@hotmail.com", "@gmail.com", "@windows.live.com" };
        public Tedarikci()
        {
            Id = adet;
            Ad = isimler[RastgeleSayi.SayiUret(0, isimler.Length)];
            Adres = adres[RastgeleSayi.SayiUret(0, adres.Length)];
            Telefon = TelBaslangic[RastgeleSayi.SayiUret(0, TelBaslangic.Length)] + RastgeleSayi.SayiUret(1000000, 9999999);
            Fax = "";
            Gsm = "";
            Web = "";
            Mail = Ad + mailuzanti[RastgeleSayi.SayiUret(0, mailuzanti.Length)];
            VergiNo = "";
            Bakiye = RastgeleSayi.SayiUret(50, 250);
        }
       public List<Hammadde> Hammaddeler = new List<Hammadde>();
    }
}
