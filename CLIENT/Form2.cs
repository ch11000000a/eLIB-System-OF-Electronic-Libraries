using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

//Сериализация
using System.Xml;
using System.Xml.Serialization;

namespace elib
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            
           
            // Изменяем конфиг
            string temp2_proxy_ip = this.textBox2.Text;
            Properties.Settings.Default.proxy_ip = temp2_proxy_ip;

            string temp2_proxy_port = this.textBox1.Text;
            Properties.Settings.Default.proxy_port = temp2_proxy_port;

            // ***************
            if (radioButton1.Checked == true)
            {
                string temp_proxy_on_off = "0";
                Properties.Settings.Default.proxy_on_off = temp_proxy_on_off;
            }
            else
            {
                string temp_proxy_on_off = "1";
                Properties.Settings.Default.proxy_on_off = temp_proxy_on_off;
            }
            // ***************

            // Proxy.Set(null); //Отключить прокси

            // Сохраняем конфиг
            Properties.Settings.Default.Save();
            Close();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            temp1_proxy_ip = this.textBox2.Text;

            string temp1_proxy_port = Properties.Settings.Default.proxy_port;
            temp1_proxy_port = this.textBox1.Text;
             
            // Выставляем значение радио баттонов
            string temp_proxy_on_off = Properties.Settings.Default.proxy_on_off;
            int temp_proxy_on_off_int = Convert.ToInt32(temp_proxy_on_off);
            if (temp_proxy_on_off_int == 1)
            {
                radioButton2.Checked = true;
            }
            else
            {
                radioButton1.Checked = true;
            }
             
            // скрываем лейблы и тексты если р.б.1 тру
            if (radioButton1.Checked == true)
            {
                label1.Visible = false;
                label2.Visible = false;
                textBox2.Visible = false;
                textBox1.Visible = false;
            }
            else
            {
                label1.Visible = true;
                label2.Visible = true;
                textBox2.Visible = true;
                textBox1.Visible = true;
            }

            // устраняем баг с визибл
            if (button2.Visible == true)
            {
                label1.Visible = false;
                label2.Visible = false;
                textBox2.Visible = false;
                textBox1.Visible = false;
            }
            return;
        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {
            Properties.Settings.Default.Save();
            label3.Visible = true;
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            Properties.Settings.Default.Save();
            label3.Visible = true;
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            //разрешить только цифры 
            if ((e.KeyChar >= '0') && (e.KeyChar <= '9'))
                return;
            //разрешить <Enter> <Beckspace> esc... 
            if (Char.IsControl(e.KeyChar))
                return;
            //все остальное запрещаем
            e.Handled = true;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            // делаем невидимыми лейблы, текстбоксы и кнопку
            label4.Visible = false;
            label5.Visible = false;
            label6.Visible = false;
            textBox3.Visible = false;
            textBox4.Visible = false;
            button2.Visible = false;

            // тут будет условие
            string login = textBox3.Text;
            string pass = textBox4.Text;
            string login_true = "admin";
            string pass_true = "123456";


            if (login == login_true && pass == pass_true)
            {
                // если логин и пасс тру то визибл настроек = тру
                button1.Visible = true;
                label8.Visible = false;
                radioButton1.Visible = true;
                radioButton2.Visible = true;
            }
            else
            {
                label7.Visible = true;
                label8.Visible = false;
            }
            return;
        }

    

        private void radioButton2_CheckedChanged(object sender, EventArgs e)
        {
            if (radioButton1.Checked == true)
            {
                label1.Visible = false;
                label2.Visible = false;
                textBox2.Visible = false;
                textBox1.Visible = false;
            }
            else
            {
                label1.Visible = true;
                label2.Visible = true;
                textBox2.Visible = true;
                textBox1.Visible = true;
            }
        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {
            if (radioButton1.Checked == true)
            {
                label1.Visible = false;
                label2.Visible = false;
                textBox2.Visible = false;
                textBox1.Visible = false;
            }
            else
            {
                label1.Visible = true;
                label2.Visible = true;
                textBox2.Visible = true;
                textBox1.Visible = true;
            }
        }

       
    }
}
