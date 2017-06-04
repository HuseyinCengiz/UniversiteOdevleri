using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Projeodevim
{
    public class Mermi : Cisim
    {
        public Mermi(int x, int y, int genislik, int yukseklik, int hiz)
        {
            X = x;
            Y = y;
            Genislik = genislik;
            Yukseklik = yukseklik;
            Hiz = hiz;
        }
        public override void Ekle(Panel pnl, string tag)
        {
            PictureBox mermi = new PictureBox();
            mermi.Size = new System.Drawing.Size(Genislik, Yukseklik);
            mermi.Location = new System.Drawing.Point(X, Y);
            mermi.SizeMode = PictureBoxSizeMode.StretchImage;
            mermi.Tag = tag;
            mermi.Image = Properties.Resources.fuze;
            pnl.Controls.Add(mermi);
        }
        public override void Hareket(Form frm)
        {
            foreach (var item in frm.Controls)
            {
                Panel pnl = (Panel)item;
                if (pnl.Name == "OyunAlani")
                {
                    foreach (var pnlitem in pnl.Controls)
                    {
                        PictureBox pic = (PictureBox)pnlitem;
                        if ((string)pic.Tag == "Mermi")
                        {
                            pic.Top -= 5;
                        }
                    }
                }
            }
        }
    }
}
