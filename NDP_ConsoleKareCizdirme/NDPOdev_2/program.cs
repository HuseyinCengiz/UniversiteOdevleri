using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NDPOdev_2
{
    class program
    {
        static void Main(string[] args)
        {
            Console.SetWindowSize(150, 32);
            RastgeleSayi rastsayi = new RastgeleSayi();
            SahnePaneli shnpnl = new SahnePaneli(90, 31);
            KontrolPaneli kntrlpnl = new KontrolPaneli(60, 16);
            BilgiPaneli blgpnl = new BilgiPaneli(60, 15);
            shnpnl.KonumAta(0, 0);
            shnpnl.Ciz();
            kntrlpnl.KonumAta(90, 0);
            kntrlpnl.Ciz();
            blgpnl.KonumAta(90, 16);
            blgpnl.Ciz();//sahne paneli,kontrol paneli,bilgipanelini olusturduk ve cizdirdik.
            while (true)
            {
                switch (Console.ReadKey().Key)//basilan tusu aldik
                {
                    case ConsoleKey.A://eger A'ya basilmissa ekrani sil seklin x ini azalt ve yeniden cizdiriyoruz
                        Console.Clear();
                        shnpnl.SekilSolaOtele();
                        shnpnl.Ciz();
                        kntrlpnl.Ciz();
                        blgpnl.Ciz();
                        break;
                    case ConsoleKey.D://eger D'ye basilmissa ekrani sil seklin x ini arttir ve yeniden cizdiriyoruz
                        Console.Clear();
                        shnpnl.SekilSagaOtele();
                        shnpnl.Ciz();
                        kntrlpnl.Ciz();
                        blgpnl.Ciz();
                        break;
                    case ConsoleKey.S://eger S'ye basilmissa ekrani sil seklin y sini arttir ve yeniden cizdiriyoruz
                        Console.Clear();
                        shnpnl.SekilAsagiOtele();
                        shnpnl.Ciz();
                        kntrlpnl.Ciz();
                        blgpnl.Ciz();
                        break;
                    case ConsoleKey.W://eger W'ye basilmissa ekrani sil seklin y sini azalt ve yeniden cizdiriyoruz
                        Console.Clear();
                        shnpnl.SekilYukariOtele();
                        shnpnl.Ciz();
                        kntrlpnl.Ciz();
                        blgpnl.Ciz();
                        break;
                    case ConsoleKey.E://Eger E'ye basilmissa yeni dortgen olusturuyoruz sahne paneline ekliyoruz sonra en son ekleneni aktif sekle atiyoruz ve digerlerini cizdiriyoruz.
                        Console.Clear();
                        Dortgen D = new Dortgen(90, 30);
                        D.BoyutAta(rastsayi.RastgeleSayiUret(2, 10), rastsayi.RastgeleSayiUret(2, 10));
                        D.KonumAta(rastsayi.RastgeleSayiUret(1, D.XSinir - D.Genislik), rastsayi.RastgeleSayiUret(1, D.YSinir - D.Yukseklik));
                        D.RenkAta((ConsoleColor)rastsayi.RastgeleSayiUret(1, 15));
                        shnpnl.AktifSekilAta(D);
                        shnpnl.SekilleriEkle(D);
                        shnpnl.Ciz();
                        kntrlpnl.Ciz();
                        blgpnl.SekilAta(D);
                        blgpnl.Ciz();
                        break;
                    default:
                        break;
                }
            }
        }
    }
}

