/*********************************************************************** 
**                        SAKARYA ÜNİVERSİTESİ                        **
**             BİLGİSAYAR VE BİLİŞİM BİLİMLERİ FAKÜLTESİ              **
**                  BİLGİSAYAR MÜHENDİSLİĞİ BÖLÜMÜ                    **
**                 NESNEYE DAYALI PROGRAMLAMA DERSİ                   **
**                      2016-2017 BAHAR DÖNEMİ                        **
**    ÖDEV NUMARASI..........: 2                                      **
**    ÖĞRENCİ ADI............: Hüseyin Cengiz                         **
**    ÖĞRENCİ NUMARASI.......: B161210111                             **
**    DERSİN ALINDIĞI GRUP...: 1-B                                    **
***********************************************************************/
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NDPOdev_2
{
    class SahnePaneli
    {
        public SahnePaneli(int genislik, int yukseklik)//gerekli baslangic degerlerini atadik
        {
            this.genislik = genislik;
            this.yukseklik = yukseklik;
            MaksimumSekilSayisi = 100;
            sekilSayisi = 0;
            adet = 0;
            cizimAlani = new Dortgen(90, 30);
            cizimAlani.RenkAta(ConsoleColor.Yellow);
            cizimAlani.BoyutAta(this.genislik, this.yukseklik);
        }
        public void KonumAta(int x, int y)//x ve y degerleri atadik
        {
            this.x = x;
            this.y = y;
            cizimAlani.KonumAta(this.x, this.y);
        }
        public void Ciz()//cizim yaptirdik
        {
            cizimAlani.RenkAta(cizimAlani.Renk);
            cizimAlani.TepeCiz();
            cizimAlani.DikeyCiz();
            cizimAlani.TabanCiz();
            for (int i = 0; i < sekilSayisi - 1; i++)
            {
                sekiller[i].RenkAta(sekiller[i].Renk);
                sekiller[i].Ciz();
            }
            if (sekilSayisi > 0)
            {
                aktifSekil.RenkAta(aktifSekil.Renk);
                aktifSekil.Ciz();
            }
        }
        public void AktifSekilAta(Dortgen yeniSekil)
        {
            if (sekilSayisi <= 100)//100 den fazla olunca  yenisekil atamasın
            {
                aktifSekil = yeniSekil;
                sekilSayisi++;
            }
        }
        public void SekilSolaOtele()
        {
            if (sekiller != null)//sahne bos ise sekil olmayacagi icin hareket ettirince hata veriyor boyle yaparak duzelttik
            {
                aktifSekil.SolaOtele();
                if (SekillerCarpisiyormu(sekiller) == true)//eger sekil carpiyorsa geri atiyor
                {
                    aktifSekil.SagaOtele();
                }
            }
        }
        public void SekilSagaOtele()
        {
            if (sekiller != null)
            {
                aktifSekil.SagaOtele();
                if (SekillerCarpisiyormu(sekiller) == true)
                {
                    aktifSekil.SolaOtele();
                }
            }

        }
        public void SekilYukariOtele()
        {
            if (sekiller != null)
            {
                aktifSekil.YukariOtele();
                if (SekillerCarpisiyormu(sekiller) == true)
                {
                    aktifSekil.AsagiOtele();
                }
            }
        }
        public void SekilAsagiOtele()
        {
            if (sekiller != null)
            {
                aktifSekil.AsagiOtele();
                if (SekillerCarpisiyormu(sekiller) == true)
                {
                    aktifSekil.YukariOtele();
                }
            }
        }
        public Dortgen[] Sekiller//dizimizi dondurduk
        {
            get { return sekiller; }
        }
        public bool SekillerCarpisiyormu(Dortgen[] sekillerim)//sahnedeki dortgenleri aldik
        {
            bool temp = false;
            for (int i = 0; i < sekilSayisi; i++)
            {
                if (aktifSekil == sekillerim[i])
                {
                    continue;
                }
                if (aktifSekil.X + aktifSekil.Genislik > sekillerim[i].X && aktifSekil.X < sekillerim[i].X + sekillerim[i].Genislik && aktifSekil.Y + aktifSekil.Yukseklik > sekillerim[i].Y && aktifSekil.Y < sekillerim[i].Y + sekillerim[i].Yukseklik)//eger benim aktif seklim sahnedekilere carparsa return true gonderek kesiyoruz.
                {
                    return true;
                }
                else//Degilse temp false atayip geri donduruyoruz.
                    temp = false;
            }
            return temp;
        }
        public void SekilleriEkle(Dortgen sekil)
        {
            if (sekilSayisi <= 100)//sekiller dizimize yeni nesne ekliyoruz
            {
                if (sekiller == null)
                    sekiller = new Dortgen[MaksimumSekilSayisi];
                for (int i = adet; i < sekilSayisi; i++)
                {
                    sekiller[i] = sekil;
                }
                adet++;
            }
        }
        private int adet;
        private int genislik;
        private int yukseklik;
        private int x;
        private int y;
        private Dortgen cizimAlani;
        private Dortgen aktifSekil;
        private int sekilSayisi;
        private int MaksimumSekilSayisi;
        private static Dortgen[] sekiller;

    }
}
