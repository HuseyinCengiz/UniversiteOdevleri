using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{

    public class Musteri : Kisi
    {
        string[] isimler = { "Hüseyin", "Kerem", "Fatih", "Harun", "Şamil", "Enes", "Ferhat", "Nihat", "Şahin", "Emre", "Emrah", "Bekir", "Ayşe", "Fatma", "Derya", "Sude", "Duygu", "Hilal", "Hülya", "Sıla", "Selva", "Kübra", "Büşra", "Tuğba", "Hande", "Tolga", "Mert", "Hakkı", "Yasin" };
        string[] adres = { "İstanbul", "Ankara", "Sinop", "İzmir", "Van", "Antalya", "Kocaeli", "Sakarya", "Edirne", "Samsun", "Trabzon", "Giresun", "Çanakkale" };
        string[] TelBaslangic = { "0531", "0532", "0535", "0542", "0541", "0530", "0536"};
        string[] mailuzanti = { "@hotmail.com","@gmail.com","@windows.live.com"};
        public Musteri()
        {
            Id = adet;
            Ad = isimler[RastgeleSayi.SayiUret(0, isimler.Length)];
            Adres = adres[RastgeleSayi.SayiUret(0, adres.Length)];
            Telefon = TelBaslangic[RastgeleSayi.SayiUret(0, TelBaslangic.Length)]+RastgeleSayi.SayiUret(1000000,9999999);
            Fax = "";
            Gsm = "";
            Web = "";
            Mail = Ad + mailuzanti[RastgeleSayi.SayiUret(0, mailuzanti.Length)];
            VergiNo = "";
            Bakiye = RastgeleSayi.SayiUret(50, 250);
            SonAlinanSiparis = new Tarih();
            SonAlinanSiparis.YilAta();
            SonVerilenSiparis = new Tarih();
            SonVerilenSiparis.YilAta();
        }

        private Tarih sonAlinanSiparis;
        private Tarih sonVerilenSiparis;
        public Tarih SonAlinanSiparis { get { return sonAlinanSiparis; } set { sonAlinanSiparis = value; } }
        public Tarih SonVerilenSiparis { get { return sonVerilenSiparis; } set { sonVerilenSiparis = value; } }

        public List<Hammadde> Hammaddeler = new List<Hammadde>();
    }
}
