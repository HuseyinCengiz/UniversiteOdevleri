using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class Barkod
    {
        public Barkod()
        {
            BarkodNo = RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(1000, 9999).ToString() + RastgeleSayi.SayiUret(0, 9).ToString();
        }
        private string barkodNo;
        public string BarkodNo
        {
            get { return barkodNo; }
            set
            {
                if (value == null)
                    throw new Hata("Barkod No Null Olamaz...");
                else
                    barkodNo = value;
            }
        }
    }
}
