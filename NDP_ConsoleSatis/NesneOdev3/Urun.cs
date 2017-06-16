using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
   public class Urun:Hammadde
    {
        public Urun(int tdrkciid, int maddenumara):base(tdrkciid,maddenumara)
        {
            NihaiMamulAdi = "İşlenmiş " + MaddeAdi;
        }
        private string nihaiMamulAdi;
        public string NihaiMamulAdi { get { return nihaiMamulAdi; } set { nihaiMamulAdi = value; } }
    }
}
