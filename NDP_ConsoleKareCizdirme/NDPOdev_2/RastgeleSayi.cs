using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NDPOdev_2
{
    class RastgeleSayi
    {
        private static Random rastgelesayi;//static random sayi tanimliyoruz
        public int RastgeleSayiUret(int min, int max)//bu metod cagirildiginda
        {
            if (rastgelesayi == null)//sayi nullsa yeni sayi olustuyoruz degilse belli sınırlar arasında random sayi gonderiyoruz.
                rastgelesayi = new Random();
            return rastgelesayi.Next(min, max);
        }
    }
}
