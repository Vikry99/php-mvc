<?php

class Karyawan extends Controller
{
    public function index()
    {
        $data['Judul'] = 'Daftar Dosen';
        $data['kryw'] = $this->model('Karyawan_model')->getAllKaryawan();
        $this->view('template/header', $data);
        $this->view('karyawan/index', $data);
        $this->view('template/footer');
    }
    public function detail($id)
    {
        $data['Judul'] = 'Detail Dosen';
        $data['kryw'] = $this->model('Karyawan_model')->getKaryawanById($id);
        $this->view('template/header', $data);
        $this->view('karyawan/detail', $data);
        $this->view('template/footer');
    }

    public function tambah()
    {
        // ketika from insert data atau tambah data di klik data akan di di tambahkan kesini kedalam $_POST
        // di jalankan method tambah data mahasisa
        if ($this->model('karyawan_model')->tambahDataKaryawan($_POST) > 0) {
            // ketika data berhasil masuk kita akan redirect ke halaman utama mahasiswa
            // sebelum di redirect kita set terlebih dahulu flash messagenya
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function hapus($id)
    {
        // ketika from insert data atau tambah data di klik data akan di di tambahkan kesini kedalam $_POST
        // di jalankan method tambah data mahasisa
        if ($this->model('karyawan_model')->hapusDataKaryawan($id) > 0) {
            // ketika data berhasil masuk kita akan redirect ke halaman utama mahasiswa
            // sebelum di redirect kita set terlebih dahulu flash messagenya
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function getubah()
    {
        // bisa menggunakan sebuah fungsi pada json untuk memprint => echo json_encode 
        echo json_encode($this->model('Karyawan_model')->getKaryawanById($_POST['id']));
    }
    public function ubah()
    {
        if ($this->model('karyawan_model')->ubahDataKaryawan($_POST) > 0) {
            // ketika data berhasil masuk kita akan redirect ke halaman utama mahasiswa
            // sebelum di redirect kita set terlebih dahulu flash messagenya
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function cari()
    {
        $data['Judul'] = 'Daftar Karyawan';
        $data['kryw'] = $this->model('Karyawan_model')->cariDataKaryawan();
        $this->view('template/header', $data);
        $this->view('karyawan/index', $data);
        $this->view('template/footer');
    }
}
