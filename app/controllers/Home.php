<?php
class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        // Sebuah data yang di ambil dari model dengan nama User_model ->getUser untuk mengambil ketika user masuk
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}
