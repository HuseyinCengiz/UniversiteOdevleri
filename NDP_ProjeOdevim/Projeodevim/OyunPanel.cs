using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Projeodevim
{
    public class OyunPanel
    {
        public void PanelEkle(Form form, string isim, int x, int y, int yukseklik, System.Drawing.Color renk)
        {
            Panel panel = new Panel();
            panel.Name = isim;
            panel.Size = new System.Drawing.Size(form.Width, yukseklik);
            panel.Location = new System.Drawing.Point(x, y);
            panel.BackColor = renk;
            form.Controls.Add(panel);
        }
        public static Panel Panel(Form form, string isim)
        {
            Panel pnl = null;
            foreach (var item in form.Controls)
            {
                pnl = (Panel)item;
                if (pnl.Name == isim)
                {
                    return pnl;
                }
            }
            return pnl;
        }
        public void PanelBilgiEkle(Panel pnl, string yazi, int x, int y, int genislik, int yukseklik, System.Drawing.Color renk)
        {
            Label lbl = new Label();
            lbl.Text = yazi;
            lbl.Size = new System.Drawing.Size(genislik, yukseklik);
            lbl.Location = new System.Drawing.Point(x, y);
            lbl.ForeColor = renk;
            pnl.Controls.Add(lbl);
        }
        public CarpismaBilgi PanelVurmaKontrol(Panel pnl)
        {
            foreach (var mermi in pnl.Controls)
            {
                PictureBox bullet = (PictureBox)mermi;
                if ((string)bullet.Tag == "Mermi")
                {
                    foreach (var ucak in pnl.Controls)
                    {
                        PictureBox plane = (PictureBox)ucak;
                        if ((string)plane.Tag == "Ucak")
                        {
                            if (bullet.Left + bullet.Width > plane.Left && bullet.Left < plane.Left + plane.Width && bullet.Top + bullet.Height > plane.Top && bullet.Top < plane.Top + plane.Height)
                            {
                                return new CarpismaBilgi { Carpistimi = true, mermi = bullet, ucak = plane };
                            }
                        }
                    }
                }
            }
            return new CarpismaBilgi { Carpistimi = false };
        }
        public void PatlamaResmiEkle(Panel pnl, int genislik, int yukseklik, int x, int y)
        {
            PictureBox pic = new PictureBox();
            pic.Size = new System.Drawing.Size(genislik, yukseklik);
            pic.Location = new System.Drawing.Point(x, y);
            pic.SizeMode = PictureBoxSizeMode.StretchImage;
            pic.Tag = "Patlama";
            pic.Image = Properties.Resources.boom;
            pnl.Controls.Add(pic);
        }
        public void PatlamaResmiSil(Panel pnl)
        {
            foreach (var item in pnl.Controls)
            {
                PictureBox pic = (PictureBox)item;
                if ((string)pic.Tag == "Patlama")
                {
                    pnl.Controls.Remove(pic);
                }
            }
        }
        public bool UcakHattiGectimi(Panel pnl)
        {
            foreach (var item in pnl.Controls)
            {
                PictureBox ucak = (PictureBox)(item);
                if ((string)(ucak.Tag) == "Ucak")
                {
                    if (ucak.Top >= pnl.Height)
                    {
                        return true;
                    }
                }
            }
            return false;
        }
        public void BosMermileriSil(Panel pnl)
        {
            foreach (var item in pnl.Controls)
            {
                PictureBox mermi = (PictureBox)item;
                if ((string)mermi.Tag == "Mermi")
                {
                    if (mermi.Top < -5)
                    {
                        pnl.Controls.Remove(mermi);
                    }
                }
            }
        }
    }
}
