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
    public abstract class Kisi
    {
        public Kisi()
        {
            adet++;
        }
        private int id;
        private string ad;
        private string adres;
        private string telefon;
        private string fax;
        private string gsm;
        private string mail;
        private string web;
        private string vergiNo;
        private int bakiye;

        public static int adet = 0;
        public int Id
        {
            get
            {
                return id;
            }
            set
            {
                if (value < 0)
                { throw new Hata("Id Negatif Değer Girilemez..."); }
                else { id = value; }
            }
        }
        public string Ad
        {
            get { return ad; }
            set {
                if(String.IsNullOrEmpty(value))
                    throw new Hata("İsim Null Veya Boş Değer Girilemez...");
                else
                ad = value;
            }
        }
        public string Adres
        {
            get { return adres; }
            set { adres = value; }
        }
        public string Telefon
        {
            get { return telefon; }
            set
            {
                if (value.Length > 11 || value.Length < 0)
                    throw new Hata("Telefon Hatalı Girdiniz Lütfen Yeniden Deneyin.");
                else
                    telefon = value;
            }
        }
        public string Fax
        {
            get { return fax; }
            set { fax = value; }
        }
        public string Gsm
        {
            get { return gsm; }
            set { gsm = value; }
        }
        public string Mail
        {
            get { return mail; }
            set { mail = value; }
        }
        public string Web
        {
            get { return web; }
            set { web = value; }
        }
        public string VergiNo
        {
            get { return vergiNo; }
            set { vergiNo = value; }
        }
        public int Bakiye
        {
            get
            {
                return bakiye;
            }
            set
            {
                if (value < 0)
                { bakiye = 0; }
                else { bakiye = value; }
            }
        }
    }
}
