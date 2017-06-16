using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NDPOdev_2
{
    public class Dortgen
    {
        public Dortgen()
        {

        }
        public Dortgen(int xSinir, int ySinir)//sinir degerlerimizi aliyoruz.
        {
            this.xSinir = xSinir;
            this.ySinir = ySinir;
        }
        public void Ciz()//dortgen cizdiriyoruz
        {
            TepeCiz();
            DikeyCiz();
            TabanCiz();
        }
        public void DikeyCiz()
        {
            for (int i = 1; i < yukseklik - 1; i++)//soldaki dik cizgiler
            {
                Console.SetCursorPosition(x, y + i);
                Console.Write(KarakterSeti.Dikey);
            }
            for (int i = 1; i < yukseklik - 1; i++)//sagdaki dik cizgiler
            {
                Console.SetCursorPosition((x + genislik - 1), y + i);
                Console.Write(KarakterSeti.Dikey);
            }
        }
        public void TepeCiz()
        {
            for (int i = 0; i < genislik; i++)//tepeyi cizdiriyoruz
            {
                if (i == 0)//i==0 ise sol köşe
                {
                    Console.SetCursorPosition(x + i, y);
                    Console.Write(KarakterSeti.SolUstKose);
                }
                else if (i == (genislik - 1))//i sonuncu ise sağ köşe
                {
                    Console.SetCursorPosition(x + i, y);
                    Console.Write(KarakterSeti.SagUstKose);
                }
                else//digerlerinde duz cizgi
                {
                    Console.SetCursorPosition(x + i, y);
                    Console.Write(KarakterSeti.Duz);
                }
            }
        }
        public void TabanCiz()
        {
            for (int i = 0; i < genislik; i++)//tabani cizdiriyoruz
            {
                if (i == 0)//i==0 ise alt sol kose
                {
                    Console.SetCursorPosition(x + i, (y + yukseklik - 1));
                    Console.Write(KarakterSeti.SolAltKose);
                }
                else if (i == (genislik - 1))//sonuncu ise alt sag kose
                {
                    Console.SetCursorPosition(x + i, (y + yukseklik - 1));
                    Console.Write(KarakterSeti.SagAltKose);
                }
                else//digerlerinde duz cizgi
                {
                    Console.SetCursorPosition(x + i, (y + yukseklik - 1));
                    Console.Write(KarakterSeti.Duz);
                }
            }
        }
        public void KonumAta(int x, int y)//x ve y atiyoruz
        {
            this.x = x;
            this.y = y;
        }
        public void BoyutAta(int genislik, int yukseklik)//boyut atiyoruz
        {
            this.genislik = genislik;
            this.yukseklik = yukseklik;
        }
        public void RenkAta(ConsoleColor renk)//renk atiyoruz
        {
            this.renk = renk;
            Console.ForegroundColor = this.renk;
        }
        public void SolaOtele()
        {
            if (x > 1)//x>1 den öyle x i azaltiyoruz
            {
                x--;
            }

        }
        public void SagaOtele()
        {
            if (x < xSinir - (genislik + 1))//x xsinirdan kucukse saga oteliyoruz
            {
                x++;
            }
        }
        public void YukariOtele()//y 0 dan buyukse yukarı oteliyoruz
        {
            if (y > 0)
            {
                y--;
            }
        }
        public void AsagiOtele()
        {
            if (y < ySinir - yukseklik)//y y sinirdan kucukse asagi oteliyoruz
            {
                y++;
            }
        }
        public ConsoleColor Renk
        {
            get { return renk; }
        }
        public int XSinir
        {
            get { return xSinir; }
        }
        public int YSinir
        {
            get { return ySinir; }
        }

        public int X
        {
            get { return x; }
        }
        public int Y
        {
            get { return y; }
        }

        public int Yukseklik
        {
            get { return yukseklik; }
        }

        public int Genislik
        {
            get { return genislik; }
        }

        private int genislik;
        private int yukseklik;
        private ConsoleColor renk;
        private int x;
        private int y;
        private int xSinir;
        private int ySinir;
    }
}
