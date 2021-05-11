<?php

class App
{
    protected $controller = 'home';
    protected $method = "index";
    protected $param = [];

    public function __construct()
    {
        //mengambil nilai dari url
        $url = $this->parseURL();

        //jadi value pertama pada array url akan di gunakan untuk controller
        //jika url kosong, maka akan diisikan controller default
        if (empty($url)) {
            $url[0] = $this->controller;
        }

        //jika url[0] ada isinya, kita akan mengambil isinya. tetapi sebelumnya akan kita cocokan terlebih dahulu apakah isinya sesuai dengan nama file/controller yg kita punya pada folder controller
        if (file_exists('../application/controllers/' . $url[0] . '.php')) {
            //nilai pada controller sebelumnya akan diganti yg baru
            $this->controller = $url[0];
            //dan valur pada $url[0] akan dihilangkan dari array
            unset($url[0]);
        }
        //memanggil file pada folder app/controller
        require_once '../application/controllers/' . $this->controller . '.php';

        //memanggil kelas pada file yg di panggil.
        //contoh: home = new home;
        $this->controller = new $this->controller;

        //method
        //mengecek apakah user menginput method pada $url
        if (isset($url[1])) {
            //mengecek apakah method yg di panggil ada didalam class yg juga di panggil
            if (method_exists($this->controller, $url[1])) {
                //mengubah method default dengan yg di input oleh user
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        //parameter
        if (!empty($url)) {
            $this->param = array_values($url);
        }


        call_user_func_array([$this->controller, $this->method], $this->param);
    }




    //fungsi dibawah ini digunakan untuk mengambil nilai dari url
    public function parseURL()
    {
        //melakukan pengecekan apakah ada element url
        if (isset($_GET['url'])) {
            //mengambil nilai nilai pada url
            $url = rtrim($_GET['url'], '/');
            //membersihkan element url  dari simbol simbol 
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //mendapat semua nilai pada element dengan pemisah /
            $url = explode('/', $url);
            //element akan di return dalam bentuk array
            return $url;
        }
    }
}
