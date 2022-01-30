<?php 

class Flasher {
    // Kita Akan membuat sebuah method web Static agar ketika memamnggil methodnya tidak perlu instansiasi pada classnya 
    public static function setFlash($pesan, $aksi, $tipe)
    {
        // disini kita akan set sesionnya yang berisikan data- data yang kita kirimkan di parameter
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // Selanjutnya kita membuat method untuk melakukan flashnya untuk menampilkan pesannya
    public static function flash()
    {
        // kita cek terlebih dahulu apakah ada sessionya atau tidak
        if ( isset($_SESSION['flash']) ) {
            // jika ada $_SESSION['flash]; tampilkan pesannya
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
                    Data Divisi <strong>' . $_SESSION['flash']['pesan']. '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                //  di hapus sessionya hanya digunakan satu kali saja menggunaakn $_SESSION
                 unset($_SESSION['flash']);
        }
    }
}
?>