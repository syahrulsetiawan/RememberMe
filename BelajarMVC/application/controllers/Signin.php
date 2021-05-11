<?php

class Signin extends Controller
{
    public function index()
    {

        $data['title'] = "Register";
        $this->view('template/headerSignin', $data);
        $this->view('signin/index');
        $this->view('template/footer');
    }

    public function login()
    {
        if (empty($_POST['userEmailPhone'])) {
            Flasher::setFlash("Form Username pada Login belum anda isi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else if (empty($_POST['password'])) {
            Flasher::setFlash("Form Password pada Login belum anda isi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        }
        $user = htmlspecialchars($_POST['userEmailPhone']);
        $pass = htmlspecialchars($_POST['password']);
        echo $pass;
        $cekData = $this->model('account_model')->cekAccount($user);
        echo "<br>";
        var_dump($cekData);
        if (isset($cekData)) {
            if (password_verify($pass, $cekData['password'])) {
                $_SESSION['account'] = [
                    'username' => $cekData['username']
                ];
                header('location:' . BASEURL);
                exit;
                // echo "password is valid";
            } else {
                echo 'password is invalid';
            }
        } else {
            echo 'gagal disini';
        }
    }

    public function register()
    {

        $fullname = htmlspecialchars($_POST['fullname']);
        $username = explode(' ', $fullname);
        $username = end($username) . $username[0] . rand(10, 100);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $pass = htmlspecialchars($_POST['password']);
        $repass = htmlspecialchars($_POST['rePassword']);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $repass = password_hash($repass, PASSWORD_DEFAULT);

        if (empty($fullname)) {
            Flasher::setFlash("Fullname pada form register tidak diisi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else if (empty($email)) {
            Flasher::setFlash("E-mail pada form register tidak diisi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else if (empty($phone)) {
            Flasher::setFlash("nomor Handphone pada form register tidak diisi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else if (empty($pass)) {
            Flasher::setFlash("Password pada form register tidak diisi", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else if (empty(htmlspecialchars($_POST['rePassword'])) || htmlspecialchars($_POST['rePassword']) != htmlspecialchars($_POST['password'])) {
            Flasher::setFlash("Konfirmasi Password pada form register tidak cocok", "mohon untuk mengisi form dengan sempurna", "danger");
            header('location:' . BASEURL . '/signin/index');
            exit;
        } else {
            $dataRegister = [
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'pass' => $pass
            ];

            $cekData = $this->model('account_model')->cekAccount($dataRegister['email']);
            var_dump($cekData);
            if ($cekData === false) {
                if ($this->model('account_model')->registerAccount($dataRegister) > 0) {
                    $_SESSION['account'] = [
                        'username' => $username
                    ];
                    header('location:' . BASEURL);
                    exit;
                }
            } else {
                Flasher::setFlash("Akun anda sudah terdaftar, ", "silahkan login", "warning");
                header('location:' . BASEURL . '/signin/index');
                exit;
            }
        }
    }
}
