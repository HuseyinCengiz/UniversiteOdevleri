using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Projeodevim
{
    public class Ucak : Cisim
    {
        public Ucak(int y, int genislik, int yukseklik, int hiz)
        {
            Y = y;
            Genislik = genislik;
            Yukseklik = yukseklik;
            Hiz = hiz;
        }
        public override void Ekle(Panel pnl, string tag)
        {
            PictureBox pic = new PictureBox();
            pic.Size = new System.Drawing.Size(Genislik, Yukseklik);
            pic.Location = new System.Drawing.Point(RastgeleSayi.SayiUret(0 + Genislik, pnl.Width - Genislik), Y);
            pic.SizeMode = PictureBoxSizeMode.StretchImage;
            pic.Tag = tag;
            pic.Image = Properties.Resources.ucak;
            pnl.Controls.Add(pic);
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
                        if ((string)pic.Tag == "Ucak")
                        {
                            pic.Top += 5;
                        }
                    }
                }
            }
        }
    }
}
