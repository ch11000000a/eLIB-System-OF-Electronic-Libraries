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
    // Подключаем .Net
    using System.Net;
    using System.Runtime.InteropServices;

    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void toolStripMenuItem1_Click(object sender, EventArgs e)
        {

        }

        private void выходToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_exit = "http://localhost/elib/logout.php";
            webBrowser1.Navigate(link_exit);
            Close();
        }

        private void button5_Click(object sender, EventArgs e)
        {

        }

        private void всеКнигиToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_get_all = "http://localhost/elib/get_all.php";
            webBrowser1.Navigate(link_get_all);
        }

        private void поискToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_seaerch = "http://localhost/elib/search/";
            webBrowser1.Navigate(link_seaerch);
        }

        private void авторизацияToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_index = "http://localhost/elib/";
            webBrowser1.Navigate(link_index);
        }

        private void оПрограммеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_o_progrmme = "http://localhost/elib/help.php";
            webBrowser1.Navigate(link_o_progrmme);
        }

        private void статистикаToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_stat = "http://localhost/elib/stat.php";
            webBrowser1.Navigate(link_stat);
        }

        private void пользователиToolStripMenuItem_Click(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            //Включить прокси
            Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
            
            string link_stat = "http://localhost/elib/users.php";
            webBrowser1.Navigate(link_stat);
        }

        private void загрузкаКнигToolStripMenuItem_Click(object sender, EventArgs e)
        {

             // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            // показываем юзеру статус прокси
            string temp_proxy_on_off = Properties.Settings.Default.proxy_on_off;
            int temp_proxy_on_off_int = Convert.ToInt32(temp_proxy_on_off);
                if (temp_proxy_on_off_int == 1) 
            {
                    this.label4.Text = "ON";
                    //Включаем прокси
                    string link_upload = "http://localhost/elib/upload/";
                    Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
                    webBrowser1.Navigate(link_upload);
            }
                else
            {
                    this.label4.Text = "OFF";
                    string link_upload = "http://localhost/elib/upload/";
                    webBrowser1.Navigate(link_upload);
            }
            
            
            
        }

        private void настройкиToolStripMenuItem_Click(object sender, EventArgs e)
        {
            new Form2().ShowDialog();
        }

        

        private void Form1_Load(object sender, EventArgs e)
        {
            // Читаем конфиг
            string temp1_proxy_ip = Properties.Settings.Default.proxy_ip;
            string temp1_proxy_port = Properties.Settings.Default.proxy_port;

            int temp1_proxy_port_int = Convert.ToInt32(temp1_proxy_port);
            string temp1_proxy_ip_string = Convert.ToString(temp1_proxy_ip);

            // показываем юзеру прокси:порт
            this.label1.Text = temp1_proxy_ip + ':' + temp1_proxy_port;

            // показываем юзеру статус прокси
            string temp_proxy_on_off = Properties.Settings.Default.proxy_on_off;
            int temp_proxy_on_off_int = Convert.ToInt32(temp_proxy_on_off);
                if (temp_proxy_on_off_int == 1) 
            {
                    this.label4.Text = "ON";
                    //Включаем прокси
                    Proxy.Set(new WebProxy(temp1_proxy_ip_string, temp1_proxy_port_int));
                    webBrowser1.Navigate("http://localhost/elib/");
            }
                else
            {
                    this.label4.Text = "OFF";
                    webBrowser1.Navigate("http://localhost/elib/");
            }
        }

       

        

      


// Подключаем класс Прокси

    }
    internal static class Proxy
    {
        #region //wininet Interop
        private enum MyOptions
        {
            INTERNET_PER_CONN_FLAGS = 1,
            INTERNET_PER_CONN_PROXY_SERVER = 2,
            INTERNET_PER_CONN_PROXY_BYPASS = 3,
            INTERNET_PER_CONN_AUTOCONFIG_URL = 4,
            INTERNET_PER_CONN_AUTODISCOVERY_FLAGS = 5,
            INTERNET_OPTION_REFRESH = 37,
            INTERNET_OPTION_PER_CONNECTION_OPTION = 75,
            INTERNET_OPTION_SETTINGS_CHANGED = 39,
            PROXY_TYPE_PROXY = 0x00000002,
            PROXY_TYPE_DIRECT = 0x00000001
        }
        private enum ROptions
        {
            INTERNET_PER_CONN_FLAGS = 1,
            INTERNET_PER_CONN_PROXY_SERVER = 2,
            INTERNET_PER_CONN_PROXY_BYPASS = 3,
            INTERNET_PER_CONN_AUTOCONFIG_URL = 4,
            INTERNET_PER_CONN_AUTODISCOVERY_FLAGS = 5,
            INTERNET_PER_CONN_AUTOCONFIG_SECONDARY_URL = 6,
            INTERNET_PER_CONN_AUTOCONFIG_RELOAD_DELAY_MINS = 7,
            INTERNET_PER_CONN_AUTOCONFIG_LAST_DETECT_TIME = 8,
            INTERNET_PER_CONN_AUTOCONFIG_LAST_DETECT_URL = 9,
            INTERNET_OPTION_REFRESH = 37,
            INTERNET_OPTION_PER_CONNECTION_OPTION = 75,
            INTERNET_OPTION_SETTINGS_CHANGED = 39,
            INTERNET_OPTION_PROXY = 38,
            INTERNET_OPEN_TYPE_PROXY = 3
        }
        [Flags]
        private enum Flags
        {
            PROXY_TYPE_DIRECT = 0x00000001, //Интернет доступ через прямое соединение(без прокси)
            PROXY_TYPE_PROXY = 0x00000002, //Интернет доступ используя прокси
            PROXY_TYPE_AUTO_PROXY_URL = 0x00000004,
            PROXY_TYPE_AUTO_DETECT = 0x00000008
        }
        [Flags]
        private enum ProxyFlags
        {
            AUTO_PROXY_FLAG_USER_SET = 0x00000001,
            AUTO_PROXY_FLAG_ALWAYS_DETECT = 0x00000002,
            AUTO_PROXY_FLAG_DETECTION_RUN = 0x00000004,
            AUTO_PROXY_FLAG_MIGRATED = 0x00000008,
            AUTO_PROXY_FLAG_DONT_CACHE_PROXY_RESULT = 0x00000010,
            AUTO_PROXY_FLAG_CACHE_INIT_RUN = 0x00000020,
            AUTO_PROXY_FLAG_DETECTION_SUSPECT = 0x00000040
        }
        [StructLayout(LayoutKind.Explicit, Size = 12)]
        private struct INTERNET_PER_CONN_OPTION
        {
            [FieldOffset(0)]
            public int dwOption;
            [FieldOffset(4)]
            public int dwValue;
            [FieldOffset(4)]
            public IntPtr pszValue;
            [FieldOffset(4)]
            public IntPtr ftValue;
            public byte[] GetBytes()
            {
                byte[] b = new byte[12];
                BitConverter.GetBytes(dwOption).CopyTo(b, 0);
                switch (dwOption)
                {
                    case (int)MyOptions.INTERNET_PER_CONN_FLAGS: BitConverter.GetBytes(dwValue).CopyTo(b, 4);
                        break;
                    case (int)MyOptions.INTERNET_PER_CONN_PROXY_BYPASS: BitConverter.GetBytes(pszValue.ToInt32()).CopyTo(b, 4);
                        break;
                    case (int)MyOptions.INTERNET_PER_CONN_PROXY_SERVER: BitConverter.GetBytes(pszValue.ToInt32()).CopyTo(b, 4);
                        break;
                }
                return b;
            }
        }
        [StructLayout(LayoutKind.Sequential, CharSet = CharSet.Auto)]
        private class INTERNET_PER_CONN_OPTION_LIST
        {
            public int dwSize;
            public string pszConnection;
            public int dwOptionCount;
            public int dwOptionError;
            public IntPtr pOptions;
        }
        [StructLayout(LayoutKind.Sequential)]
        private struct INTERNET_PROXY_INFO
        {
            public int dwAccessType;
            public IntPtr lpszProxy;
            public IntPtr lpszProxyBypass;
        }
        private const int ERROR_INSUFFICIENT_BUFFER = 122;
        private const int INTERNET_OPTION_PROXY = 38;
        private const int INTERNET_OPEN_TYPE_DIRECT = 1;
        private const int INTERNET_OPEN_TYPE_PROXY = 3;
        [DllImport("wininet.dll", SetLastError = true)]
        private static extern bool InternetSetOption(IntPtr hInternet, int dwOption, INTERNET_PER_CONN_OPTION_LIST lpBuffer, int dwBufferLength);
        [DllImport("wininet.dll", SetLastError = true)]
        private static extern bool InternetSetOption(IntPtr hInternet, int dwOption, IntPtr lpBuffer, int lpdwBufferLength);
        [DllImport("kernel32.dll")]
        private static extern int GetLastError();
        #endregion
        public static bool Set(WebProxy wProxy)
        {
            try
            {
                bool bReturn = false;
                INTERNET_PROXY_INFO info = new INTERNET_PROXY_INFO();
                string sPrx = "";
                if (wProxy != null)
                {
                    sPrx = wProxy.Address.DnsSafeHost + ":" + wProxy.Address.Port;
                    info.dwAccessType = INTERNET_OPEN_TYPE_PROXY;
                }
                else
                {
                    info.dwAccessType = INTERNET_OPEN_TYPE_DIRECT;
                }
                info.lpszProxy = Marshal.StringToHGlobalAnsi(sPrx);
                info.lpszProxyBypass = Marshal.StringToHGlobalAnsi("rado.ra-host.com");
                // Allocating memory
                IntPtr intptrStruct = Marshal.AllocCoTaskMem(Marshal.SizeOf(info));
                // Converting structure to IntPtr
                Marshal.StructureToPtr(info, intptrStruct, true);
                bReturn = InternetSetOption(IntPtr.Zero, INTERNET_OPTION_PROXY, intptrStruct, Marshal.SizeOf(info));
                if (!bReturn)
                {
                    Console.WriteLine(GetLastError());
                }
                //InternetSetOption(IntPtr.Zero, 75, intptrStruct, Marshal.SizeOf(struct_IPI));
                bReturn = InternetSetOption(IntPtr.Zero, (int)MyOptions.INTERNET_OPTION_REFRESH, IntPtr.Zero, 0);
                if (!bReturn)
                {
                    Console.WriteLine(GetLastError());
                }
                Marshal.FreeCoTaskMem(intptrStruct);
                return bReturn;
            }
            catch (Exception)
            {
                throw;
            }
        }
        private static bool ProxyEnable(WebProxy wProxy)
        {
            try
            {
                bool bReturn = true;
                string sPrx = wProxy.Address.DnsSafeHost + ":" + wProxy.Address.Port;
                INTERNET_PER_CONN_OPTION_LIST list = new INTERNET_PER_CONN_OPTION_LIST();
                int dwBufSize = Marshal.SizeOf(list);
                INTERNET_PER_CONN_OPTION[] opts = new INTERNET_PER_CONN_OPTION[3];
                int opt_size = Marshal.SizeOf(opts[0]);
                list.dwSize = dwBufSize;
                list.pszConnection = String.Empty;
                list.dwOptionCount = 3;
                //set flags
                opts[0].dwOption = (int)MyOptions.INTERNET_PER_CONN_FLAGS;
                //opts[0].dwValue = (int)(Options.PROXY_TYPE_DIRECT | Options.PROXY_TYPE_PROXY);
                //opts[0].dwValue = (int)(MyOptions.PROXY_TYPE_DIRECT | MyOptions.PROXY_TYPE_PROXY);
                opts[0].dwValue = (int)(Flags.PROXY_TYPE_PROXY);
                //set proxyname
                opts[1].dwOption = (int)MyOptions.INTERNET_PER_CONN_PROXY_SERVER;
                //opts[1].pszValue = Marshal.StringToHGlobalAnsi("http://" + sPrx);
                opts[1].pszValue = Marshal.StringToHGlobalAnsi(sPrx);
                //opts[1].pszValue = Marshal.StringToCoTaskMemAnsi("http=http://" + sPrx + "; ftp=ftp://" + sPrx + "; https=https://" + sPrx + "; gopher=gopher://" + sPrx + "; socks=socks://" + sPrx);
                //set override
                opts[2].dwOption = (int)MyOptions.INTERNET_PER_CONN_PROXY_BYPASS;
                opts[2].pszValue = Marshal.StringToHGlobalAnsi("localhost");
                //opts[2].pszValue = Marshal.StringToCoTaskMemAnsi("<local>localhost; rado.ra-host.com");
                byte[] b = new byte[3 * opt_size];
                opts[0].GetBytes().CopyTo(b, 0);
                opts[1].GetBytes().CopyTo(b, opt_size);
                opts[2].GetBytes().CopyTo(b, 2 * opt_size);
                IntPtr ptr = Marshal.AllocCoTaskMem(3 * opt_size);
                Marshal.Copy(b, 0, ptr, 3 * opt_size);
                list.pOptions = ptr;
                //set the options on the connection
                bReturn = InternetSetOption(IntPtr.Zero, (int)MyOptions.INTERNET_OPTION_PER_CONNECTION_OPTION, list, dwBufSize);
                if (!bReturn)
                {
                    Console.WriteLine(GetLastError());
                }
                //Flush the current IE proxy setting
                bReturn = InternetSetOption(IntPtr.Zero, (int)MyOptions.INTERNET_OPTION_REFRESH, IntPtr.Zero, 0);
                if (!bReturn)
                {
                    Console.WriteLine(GetLastError());
                }
                Marshal.FreeHGlobal(opts[1].pszValue);
                Marshal.FreeHGlobal(opts[2].pszValue);
                Marshal.FreeCoTaskMem(ptr);
                return bReturn;
            }
            catch (Exception)
            {
                throw;
            }
        }

    }
}
