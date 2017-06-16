using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class YariMamul : Hammadde
    {
        public YariMamul(int tdrkciid, int maddenumara) : base(tdrkciid, maddenumara)
        {
            YariMamulAdi = "İşlenmiş " + MaddeAdi;
        }
        private string yariMamulAdi;
        public string YariMamulAdi { get { return yariMamulAdi; } set { yariMamulAdi = value; } }
    }
}
