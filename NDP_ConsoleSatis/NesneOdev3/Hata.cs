using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NesneOdev3
{
    public class Hata : Exception
    {
        //Exception Sınıfından kalıtım aldım ve kendi hatamı constructur yardımıyla  ekrana bastırıyorum.
        public Hata(string mesaj):base(mesaj){}
        public void Mesaj()
        {
            Console.WriteLine(Message);
        }
    }
}
