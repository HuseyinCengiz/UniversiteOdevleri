using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Projeodevim
{
    abstract public class Cisim
    {
        private int x;
        private int y;
        private int genislik;
        private int yukseklik;
        private int hiz;
        public int X { get { return x; } set { if (value < 0) { x = 0; } else { x = value; } } }
        public int Y { get { return y; } set { if (value < 0) { y = 0; } else { y = value; } } }
        public int Genislik { get { return genislik; } set { if (value < 0) { genislik = 0; } else { genislik = value; } } }
        public int Yukseklik { get { return yukseklik; } set { if (value < 0) { yukseklik = 0; } else { yukseklik = value; } } }
        public int Hiz { get { return hiz; } set { if (value < 0) { hiz = 0; } else { hiz = value; } } }
        public virtual void Hareket(Form frm)
        {

        }
        abstract public void Ekle(Panel pnl, string tag);
    }
}
