<?php

class Home extends Controller
{
    public function index()
    {

        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $data['notes'] = $this->model('notes_model')->getAllNotes($data['profile']['id_account']);

        $data['title'] = 'Home';
        $nameNavbar = explode(' ', $data['profile']['fullname']);
        $nameNavbar = $nameNavbar[0];
        $this->view('template/header', $data);
        $this->view('template/navbar', $nameNavbar);
        $this->view('home/index', $data);

        $this->view('home/footer-content');
        $this->view('template/footer');
    }

    public function notification()
    {

        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $data['notes'] = $this->model('notes_model')->getAllNotification($data['profile']['id_account']);

        $data['title'] = 'Home';
        $nameNavbar = explode(' ', $data['profile']['fullname']);
        $nameNavbar = $nameNavbar[0];
        $this->view('template/header', $data);
        $this->view('template/navbar', $nameNavbar);
        $this->view('home/notification', $data);
        $this->view('home/footer-content');
        $this->view('template/footer');
    }

    public function archieve()
    {

        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $data['notes'] = $this->model('notes_model')->getAllArchieve($data['profile']['id_account']);

        $data['title'] = 'Home';
        $nameNavbar = explode(' ', $data['profile']['fullname']);
        $nameNavbar = $nameNavbar[0];
        $this->view('template/header', $data);
        $this->view('template/navbar', $nameNavbar);
        $this->view('home/archieve', $data);
        $this->view('home/footer-content');
        $this->view('template/footer');
    }

    public function trash()
    {

        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $data['notes'] = $this->model('notes_model')->getAllTrash($data['profile']['id_account']);

        $data['title'] = 'Home';
        $nameNavbar = explode(' ', $data['profile']['fullname']);
        $nameNavbar = $nameNavbar[0];
        $this->view('template/header', $data);
        $this->view('template/navbar', $nameNavbar);
        $this->view('home/trash', $data);
        $this->view('home/footer-content');
        $this->view('template/footer');
    }

    public function addNew()
    {
        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $id = $data['profile']['id_account'];

        if ($this->model('notes_model')->addNewNote($id, $_POST) > 0) {
            header('location:' . BASEURL);
            exit;
        }
        // var_dump($_POST);
    }

    public function removeTrash($idNote)
    {
        $this->model('notes_model')->removeNoteFromTrash($idNote);
        header('location:' . BASEURL . '/home/trash');
        exit;
    }
    public function delete($idNote)
    {
        $this->model('notes_model')->deleteNote($idNote);
        header('location:' . BASEURL . '/home/trash');
        exit;
    }

    public function moveToTrash($idNote)
    {
        $this->model('notes_model')->moveNoteToTrash($idNote);
        header('location:' . BASEURL);
        exit;
    }
    public function moveToArchive($idNote)
    {
        $this->model('notes_model')->moveNoteToArchive($idNote);
        header('location:' . BASEURL);
        exit;
    }

    public function removeFromArchive($idNote)
    {
        $this->model('notes_model')->removeNoteFromArchive($idNote);
        header('location:' . BASEURL . '/home/archieve');
        exit;
    }
    public function update($idnote)
    {
        $this->model('notes_model')->updateNote($idnote, $_POST);
        header('location:' . BASEURL);
        exit;
    }

    public function account()
    {
        header('location:' . BASEURL);
        exit;
    }

    public function search()
    {


        if (!isset($_SESSION['account'])) {
            header('location:' . BASEURL . '/signin');
            exit;
        }
        $dataAccount = $_SESSION['account'];
        $data['profile'] = $this->model('account_model')->getAccount($dataAccount['username']);
        $id = $data['profile']['id_account'];
        $data['notes'] = $this->model('notes_model')->searchNote($id, $_POST['keySearch']);
        $data['title'] = "Hasil Pencarian";

        $nameNavbar = explode(' ', $data['profile']['fullname']);
        $nameNavbar = $nameNavbar[0];
        $this->view('template/header', $data);
        $this->view('template/navbar', $nameNavbar);
        $this->view('home/index', $data);
        $this->view('home/footer-content');
        $this->view('template/footer');
    }

    public function detail()
    {
        echo "Hello World detail";
    }
}
