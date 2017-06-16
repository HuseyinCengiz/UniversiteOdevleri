using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class Tarih
    {
        public Tarih()
        {
            
        }
       public void YilAta()
        {
            Gun = RastgeleSayi.SayiUret(1, 31);
            Ay = RastgeleSayi.SayiUret(1, 12);
            Yil = RastgeleSayi.SayiUret(2000, 2030);
        }
        private int gun;
        private int ay;
        private int yil;
        public int Gun
        {
            get { return gun; }
            set
            {
                if (value > 0 && value <= 31)
                {
                    gun = value;
                }
                else
                {
                    gun = 1;
                }
            }
        }
        public int Ay
        {
            get { return ay; }
            set
            {
                if (value > 0 && value <= 12)
                {
                    ay = value;
                }
                else
                {
                    ay = 1;
                }
            }
        }
        public int Yil
        {
            get { return yil; }
            set
            {
                if (value < 0)
                {
                    yil = 0;
                }
                else
                {
                    yil = value;
                }
            }
        }
        public string TarihVer()
        {
            string tarih = Gun + "/" + Ay + "/" + Yil;
            return tarih;
        }
    }
}
