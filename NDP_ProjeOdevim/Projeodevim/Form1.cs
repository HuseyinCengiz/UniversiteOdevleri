using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Media;

namespace Projeodevim
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        OyunPanel pnl;
        UcakSavar ucaksavar;
        Ucak ucak;
        int sayac = 0;
        SoundPlayer ucaksesi;
        public Timer Timer1;
        public Timer Timer2;
        private void Form1_Load(object sender, EventArgs e)
        {
            CenterToScreen();
            this.MaximizeBox = false;
            Timer1 = new Timer();
            Timer1.Interval = 16;
            Timer1.Enabled = false;
            Timer1.Tick += Timer1_Tick;
            Timer2 = new Timer();
            Timer2.Interval = 500;
            Timer2.Enabled = false;
            Timer2.Tick += Timer2_Tick;
            pnl = new OyunPanel();
            pnl.PanelEkle(this, "OyunBilgi", 0, 0, 75, Color.Teal);
            pnl.PanelEkle(this, "OyunAlani", 0, 0, 725, Color.FromArgb(239, 190, 43));
            pnl.PanelBilgiEkle(OyunPanel.Panel(this, "OyunBilgi"), "Oyunu başlatmak için ENTER tuşuna basınız.", 5, 5, this.Width, 20, Color.White);
            pnl.PanelBilgiEkle(OyunPanel.Panel(this, "OyunBilgi"), "Uçaksavarı hareket ettirmek için SAĞ/SOL YÖN TUŞLARINI kullanın.", 5, 30, this.Width, 20, Color.White);
            pnl.PanelBilgiEkle(OyunPanel.Panel(this, "OyunBilgi"), "Ateş etmek için BOŞLUK tuşuna basınız.", 5, 55, this.Width, 20, Color.White);
            ucaksavar = new UcakSavar((this.Width / 2) - 50, this.Height - 100, 30, 50, 30);
            ucaksavar.Ekle(OyunPanel.Panel(this, "OyunAlani"), "Ucaksavar");
            ucaksesi = new SoundPlayer(Properties.Resources.ucaksesi);
            ucak = new Ucak(0, 35, 35, 3);
        }
        private void Timer2_Tick(object sender, EventArgs e)
        {
            pnl.PatlamaResmiSil(OyunPanel.Panel(this, "OyunAlani"));
            sayac++;
            if (sayac % 10 == 0)
            {
                pnl.BosMermileriSil(OyunPanel.Panel(this, "OyunAlani"));
            }
            if (sayac % 2 == 0)
            {
                ucak.Ekle(OyunPanel.Panel(this, "OyunAlani"), "Ucak");
            }
        }
        SoundPlayer vurmasesi = new SoundPlayer(Properties.Resources.vurmasesi);
        private void Timer1_Tick(object sender, EventArgs e)
        {
            ucaksavar.MermiHareket(this);
            ucak.Hareket(this);
            bool yenilgi = pnl.UcakHattiGectimi(OyunPanel.Panel(this, "OyunAlani"));
            if (yenilgi == true)
            {
                Timer2.Enabled = false;
                Timer1.Enabled = false;
                ucaksesi.Stop();
                vurmasesi.Stop();
                DialogResult cevap = MessageBox.Show("Malesef Yenildin Oyunu Yeniden Başlatmak İstiyor Musun ?", "Yenilgi", MessageBoxButtons.OKCancel);
                if (cevap == DialogResult.OK)
                {
                    Application.Restart();
                }
                else
                {
                    Application.Exit();
                }
            }
            CarpismaBilgi kontrol = pnl.PanelVurmaKontrol(OyunPanel.Panel(this, "OyunAlani"));
            if (kontrol.Carpistimi == true)
            {
                pnl.PatlamaResmiEkle(OyunPanel.Panel(this, "OyunAlani"), 30, 30, kontrol.ucak.Left, kontrol.ucak.Top);
                OyunPanel.Panel(this, "OyunAlani").Controls.Remove(kontrol.mermi);
                OyunPanel.Panel(this, "OyunAlani").Controls.Remove(kontrol.ucak);
                vurmasesi.Play();
            }
        }
        private void Form1_KeyDown(object sender, KeyEventArgs e)
        {
            if (Timer1.Enabled == true && Timer2.Enabled == true)
            {
                if (e.KeyCode == Keys.Left)
                {
                    ucaksavar.SolaGit();
                }
                if (e.KeyCode == Keys.Right)
                {
                    ucaksavar.SagaGit(this);
                }
                if (e.KeyCode == Keys.Space)
                {
                    ucaksavar.AtesEt(OyunPanel.Panel(this, "OyunAlani"));
                }
            }
            if (e.KeyCode == Keys.Enter)
            {
                Timer1.Enabled = true;
                Timer2.Enabled = true;
                ucaksesi.Play();
            }
        }
    }
}
