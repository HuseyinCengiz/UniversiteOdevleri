using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Projeodevim
{
    public static class RastgeleSayi
    {
        private static Random Rastgele;
        public static int SayiUret(int min, int max)
        {
            if (Rastgele == null)
                Rastgele = new Random();
            return Rastgele.Next(min, max);
        }
    }
}
