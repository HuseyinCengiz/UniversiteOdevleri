using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class Hammadde
    {
        public static string[] hammaddeIsimleri = { "Bakır", "Çelik", "Çinko", "Titanyum", "Aliminyun", "Platin", "Gümüş", "Kurşun", "Tungsten", "Altın", "Pirinç" };
        public Hammadde()
        {
            Miktari = 0;
        }
        public Hammadde(int tdrkcid,int maddenumara)
        {
            MaddeAdi = hammaddeIsimleri[maddenumara];
            TedarikciId = tdrkcid;
            Miktari = RastgeleSayi.SayiUret(50, 100);
            MinSiparis = RastgeleSayi.SayiUret(1, 10);
            AdetFiyat= RastgeleSayi.SayiUret(1, 10);
            AlinmaTarihi = new Tarih();
            BarkodNo = new Barkod();
        }
        private Barkod barkodNo;
        private int tedarikciId;
        private Tarih alinmaTarihi;
        private int miktari;
        private int minSiparis;
        private string maddeAdi;
        private int adetfiyat;
        public Barkod BarkodNo { get { return barkodNo; } set { barkodNo = value; } }
        public int TedarikciId
        {
            get { return tedarikciId; }
            set
            {
                if (value < 0)
                    throw new Hata("TedarikciId Negatif Değer Girilemez...");
                else
                {
                    tedarikciId = value;
                }
            }
        }
        public Tarih AlinmaTarihi { get { return alinmaTarihi; } set { alinmaTarihi = value; } }
        public int Miktari
        {
            get { return miktari; }
            set
            {
                if (value < 0)
                    throw new Hata("Miktar 0'dan Küçük Olamaz...");
                else
                {
                    miktari = value;
                }
            }
        }
        public int AdetFiyat
        {
            get { return adetfiyat; }
            set
            {
                if (value < 0)
                    throw new Hata("Fiyat 0'dan Küçük Olamaz...");
                else
                {
                    adetfiyat = value;
                }
            }
        }
        public int MinSiparis
        {
            get { return minSiparis; }
            set
            {
                if (value < 0)
                    throw new Hata("Min. Siparis 0'dan Küçük Olamaz...");
                else
                {
                    minSiparis = value;
                }
            }
        }
        public string MaddeAdi { get { return maddeAdi; }
            set {
                if (value == null)
                    throw new Hata("Madde Adı Null Olamaz...");
                else
                    maddeAdi = value;
            } }
    }
}
