using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
namespace Projeodevim
{
    public class UcakSavar : Cisim, IAteslenebilir
    {
        public UcakSavar(int x, int y, int genislik, int yukseklik, int hiz)
        {
            X = x;
            Y = y;
            Genislik = genislik;
            Yukseklik = yukseklik;
            Hiz = hiz;
            mermi = new Mermi(X, Y - 20, 15, 25, 15);
        }
        private Mermi mermi;
        public void AtesEt(Panel pnl)
        {
            mermi.X = X + 10;
            mermi.Ekle(pnl, "Mermi");
        }
        public void MermiHareket(Form frm)
        {
            mermi.Hareket(frm);
        }
        private PictureBox pic;

        public void SagaGit(Form frm)
        {
            if (pic.Left + (2 * pic.Width) < OyunPanel.Panel(frm, "OyunAlani").Width)
            {
                pic.Left += Hiz;
                X += Hiz;
            }
        }
        public void SolaGit()
        {
            if (pic.Left - (pic.Width / 2) > 0)
            {
                pic.Left -= Hiz;
                X -= Hiz;
            }
        }
        public override void Ekle(Panel pnl, string tag)
        {
            pic = new PictureBox();
            pic.Size = new System.Drawing.Size(Genislik, Yukseklik);
            pic.Location = new System.Drawing.Point(X, Y);
            pic.SizeMode = PictureBoxSizeMode.StretchImage;
            pic.Tag = tag;
            pic.Image = Properties.Resources.tank;
            pnl.Controls.Add(pic);
        }
    }
}
