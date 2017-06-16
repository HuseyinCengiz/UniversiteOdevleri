using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class Isletme
    {
        public List<Musteri> Musteriler = new List<Musteri>();
        public List<Tedarikci> Tedarikciler = new List<Tedarikci>();
        public int MenuSecim()
        {
            int secim = 0;
            Console.WriteLine("1.Tedarikci Ekle");
            Console.WriteLine("2.Tedarikçi Listele");
            Console.WriteLine("3.Müsteri Ekle");
            Console.WriteLine("4.Müsteri Listele");
            Console.WriteLine("5.Hammadde Al");
            Console.WriteLine("6.Çıkış");
            secim = int.Parse(Console.ReadLine());
            if (secim <= 0 || secim > 6)//farklı seçim yaparsa hata fırlttık.
                throw new Hata("Hatalı Seçim Yaptınız");
            return secim;
        }
        public void MusteriEkle()
        {
            Musteri musteri = new Musteri();//Müşteri Eklettik
            Musteriler.Add(musteri);
        }
        public void TedarikciEkle()
        {
            Tedarikci tedarikci = new Tedarikci();
            Tedarikciler.Add(tedarikci);//Listeye tedarikci eklettik. 
            int randsayi = RastgeleSayi.SayiUret(1, Hammadde.hammaddeIsimleri.Length);
            for (int i = 0; i < randsayi; i++)//her tedarikciye farklı sayıda hammadde ekletiyoruz.
            {
                Hammadde hammadde = new Hammadde(tedarikci.Id, i);
                tedarikci.Hammaddeler.Add(hammadde);
            }
        }
        public void HammaddeAl()
        {
            int musteriid = 0;
            Console.WriteLine("-------------------------Müşteriler------------------------------\n");
            foreach (var item in Musteriler)//ilk önce varolan müşterileri listelettik.
            {
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-10} {4,-10}", "Ad", "Telefon", "Mail", "Bakiye", "ID"));
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-10} {4,-10}", item.Ad, item.Telefon, item.Mail, item.Bakiye, item.Id));
                Console.WriteLine(String.Format("{0,-20} {1,-10}", "Son Alınan Sipariş :", item.SonAlinanSiparis.TarihVer()));
                Console.WriteLine(String.Format("{0,-20} {1,-10}", "Son Verilen Sipariş:", item.SonVerilenSiparis.TarihVer()));
                Console.WriteLine("----------------------------------------------------------------");
            }
            Console.WriteLine("Müşteri ID'nizi Giriniz:");//Daha sonra ürünü hangi müşteri alacaksa kendi id'sini girdirdik
            musteriid = int.Parse(Console.ReadLine());
            if (musteriid < 0)
                throw new Hata("Müşteri Id Negatif Değer Girilemez...");
            Musteri Musteri = null;
            foreach (var musteri in Musteriler)//Id'si girilen müsterinin bilgisini çektik.
            {
                if (musteri.Id == musteriid)
                {
                    Musteri = musteri;
                }
            }
            if (Musteri == null)//eğer müsteri boş gelirse hata fırlattık.
                throw new Hata("Böyle Bir Müşteri Yok");
            Console.WriteLine("-------------------------Tedarikciler------------------------------\n");//sonra varolan tedarikcileri listelettik.
            int sayac = 0;
            foreach (var item in Tedarikciler)
            {
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", "Ad", "Telefon", "Mail", "Bakiye", "ID"));
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", item.Ad, item.Telefon, item.Mail, item.Bakiye, item.Id));
                Console.WriteLine();
                Console.WriteLine(String.Format("{0,-20} {1,-20} {2,-10} {3,-15} {4,-10} ", "Barkod No", "Madde Adı", "Miktarı", "Min. Sipariş", "Adet Fiyat"));
                foreach (var madde in item.Hammaddeler)//tedarikcilerin her birinin ürünlerini yazdırdık.
                {
                    if (sayac % 2 == 0)
                    {
                        Console.BackgroundColor = ConsoleColor.Yellow;
                        Console.ForegroundColor = ConsoleColor.Blue;
                    }
                    else
                    {
                        Console.BackgroundColor = ConsoleColor.Green;
                        Console.ForegroundColor = ConsoleColor.Red;
                    }
                    Console.WriteLine(String.Format("{0,-20} {1,-20} {2,-10} {3,-15} {4,-10}", madde.BarkodNo.BarkodNo, madde.MaddeAdi, madde.Miktari, madde.MinSiparis, madde.AdetFiyat));
                    sayac++;

                }
                Console.BackgroundColor = ConsoleColor.Black;
                Console.ForegroundColor = ConsoleColor.Gray;
                Console.WriteLine();
                Console.WriteLine("-------------------------------------------------------------------");
            }
            int tdrkcid = 0;
            Console.WriteLine("Hangi Tedarikçiden Almak İstiyorsanız ID'sini Giriniz:");//Hangi tedarikciden hammadde alınacaksa onun id'sini giriyoruz.
            tdrkcid = int.Parse(Console.ReadLine());
            if (tdrkcid < 0)
                throw new Hata("Tedarikçi Id Negatif Değer Girilemez...");
            Tedarikci Tedarikci = null;
            foreach (var tedarikci in Tedarikciler)//Id'si girilen tedarikcinin bilgisini çektik.
            {
                if (tedarikci.Id == tdrkcid)
                {
                    Tedarikci = tedarikci;
                }
            }
            if (Tedarikci == null)//eğer tedarikci boş gelirse hata fırlattık.
                throw new Hata("Böyle Bir Tedarikçi Yok");
            Console.WriteLine("Almak İstediğiniz Hammaddenin Barkod No'sunu Giriniz:");//Hangi ürünü alacağını seçtirdik.
            string BarkodNo = Console.ReadLine();
            if (String.IsNullOrEmpty(BarkodNo))
                throw new Hata("Barkod No Null Veya Boş Olamaz...");
            Hammadde Madde = null;
            foreach (var madde in Tedarikci.Hammaddeler)//Barkod No'su girilen maddenin bilgisini çektik.
            {
                if (madde.BarkodNo.BarkodNo == BarkodNo)
                {
                    Madde = madde;
                }
            }
            if (Madde == null)//eğer madde boş gelirse hata fırlattık.
                throw new Hata("Böyle Bir Madde Yok");

            Console.WriteLine("Kaç Adet Almak İstiyorsunuz ?");
            int adet = int.Parse(Console.ReadLine());
            if (adet < 0 || adet > Madde.Miktari)//eğer adet negatif veya seçilen ürünün varolan miktarından fazla girilirse hata fırlattık.
                throw new Hata("Adet Negatif Değer Ya da Varolan Miktardan Büyük Girilemez...");
            if (adet >= Madde.MinSiparis)//eğer girilen adet seçilen ürünün varolan miktarından az girilirse toplamtutarı hesaplattık.
            {
                int ToplamTutar = adet * Madde.AdetFiyat;
                if (Musteri.Bakiye >= ToplamTutar)//Toplam tutar müşterinin bakiyesinden küçükse satın alma işlemleri yaptırdık.
                {
                    Hammadde alinanmadde = new Hammadde();
                    alinanmadde.TedarikciId = Musteri.Id;
                    alinanmadde.Miktari += adet;
                    alinanmadde.AlinmaTarihi = new Tarih();
                    alinanmadde.AlinmaTarihi.Gun = DateTime.Now.Day;
                    alinanmadde.AlinmaTarihi.Ay = DateTime.Now.Month;
                    alinanmadde.AlinmaTarihi.Yil = DateTime.Now.Year;
                    alinanmadde.BarkodNo = Madde.BarkodNo;
                    alinanmadde.MinSiparis = Madde.MinSiparis;
                    alinanmadde.MaddeAdi = Madde.MaddeAdi;
                    alinanmadde.AdetFiyat = Madde.AdetFiyat;
                    Tedarikci.Bakiye += ToplamTutar;
                    Madde.Miktari -= adet;
                    Musteri.Bakiye -= ToplamTutar;
                    Musteri.SonVerilenSiparis = new Tarih();
                    Musteri.SonVerilenSiparis.Gun = DateTime.Now.Day;
                    Musteri.SonVerilenSiparis.Ay = DateTime.Now.Month;
                    Musteri.SonVerilenSiparis.Yil = DateTime.Now.Year;
                    Musteri.Hammaddeler.Add(alinanmadde);
                    Console.WriteLine("Hammadde Alındı...");
                    Console.ReadKey();
                }
                else // Bakiyemiz yetersizse yine hata fırlatıyoruz.
                {
                    throw new Hata("Yeterli Bakiyeniz Yok");
                }
            }
            else // varolan madde adetini hata olarak fırlatıyoruz.
            {
                throw new Hata(String.Format("En az {0} tane alınabilir", Madde.MinSiparis));
            }
        }
        public void MusteriListele()
        {
            Console.WriteLine("---------------------------Müşteriler------------------------------\n");
            foreach (var item in Musteriler)//Müşteriler Listesini dönüp içindeki değerleri yazdırıyoruz
            {
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", "Ad", "Telefon", "Mail", "Bakiye", "ID"));
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", item.Ad, item.Telefon, item.Mail, item.Bakiye, item.Id));
                Console.WriteLine(String.Format("{0,-20} {1,-10}", "Son Alınan Sipariş :", item.SonAlinanSiparis.TarihVer()));
                Console.WriteLine(String.Format("{0,-20} {1,-10}", "Son Verilen Sipariş:", item.SonVerilenSiparis.TarihVer()));
                Console.WriteLine("-------------------------------------------------------------------");
                int sayac = 0;
                foreach (var madde in item.Hammaddeler)//her müşterinin kaç maddesi varsa onları yazdırıyoruz.
                {
                    if (sayac % 2 == 0)
                    {
                        Console.BackgroundColor = ConsoleColor.Yellow;
                        Console.ForegroundColor = ConsoleColor.Blue;
                    }
                    else
                    {
                        Console.BackgroundColor = ConsoleColor.Green;
                        Console.ForegroundColor = ConsoleColor.Red;
                    }
                    Console.WriteLine(String.Format("{0,-15} {1,-20} {2,-10} {3,-13} {4,-12}", "Barkod No", "Madde Ad", "Miktar", "Min. Sipariş", "Alınan Fiyat"));
                    Console.WriteLine(String.Format("{0,-15} {1,-20} {2,-10} {3,-13} {4,-12}", madde.BarkodNo.BarkodNo, madde.MaddeAdi, madde.Miktari, madde.MinSiparis, madde.AdetFiyat));
                    sayac++;
                }
                Console.BackgroundColor = ConsoleColor.Black;
                Console.ForegroundColor = ConsoleColor.Gray;
                Console.WriteLine();
                Console.WriteLine("-------------------------------------------------------------------");
            }
            Console.ReadKey();
        }
        public void TedarikciListele()
        {
            Console.WriteLine("-------------------------Tedarikciler------------------------------\n");
            int sayac = 0;
            foreach (var item in Tedarikciler)//Tedarikciler Listesini dönüp içindeki değerleri yazdırıyoruz
            {
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", "Ad", "Telefon", "Mail", "Bakiye", "ID"));
                Console.WriteLine(String.Format("{0,-15} {1,-15} {2,-25} {3,-8} {4,-8}", item.Ad, item.Telefon, item.Mail, item.Bakiye, item.Id));
                Console.WriteLine();
                Console.WriteLine(String.Format("{0,-20} {1,-20} {2,-10} {3,-15} {4,-10} ", "Barkod No", "Madde Adı", "Miktarı", "Min. Sipariş", "Adet Fiyat"));
                foreach (var madde in item.Hammaddeler) //her müşterinin kaç maddesi varsa onları yazdırıyoruz.
                {
                    if (sayac % 2 == 0)
                    {
                        Console.BackgroundColor = ConsoleColor.Yellow;
                        Console.ForegroundColor = ConsoleColor.Blue;
                    }
                    else
                    {
                        Console.BackgroundColor = ConsoleColor.Green;
                        Console.ForegroundColor = ConsoleColor.Red;
                    }
                    Console.WriteLine(String.Format("{0,-20} {1,-20} {2,-10} {3,-15} {4,-10}", madde.BarkodNo.BarkodNo, madde.MaddeAdi, madde.Miktari, madde.MinSiparis, madde.AdetFiyat));
                    sayac++;

                }
                Console.BackgroundColor = ConsoleColor.Black;
                Console.ForegroundColor = ConsoleColor.Gray;
                Console.WriteLine();
                Console.WriteLine("-------------------------------------------------------------------");
            }
            Console.WriteLine("Devam Etmek İçin Enter'a Basınız...");
            Console.ReadKey();
        }
    }
}
