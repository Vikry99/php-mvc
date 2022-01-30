$(function() {
    // jika di terjemahkan kita meminta tolong jquery untuk mencarikan sebuah classs lalu ketika di klik jalankan fungsi ini 
    $('.tombolTambahData').on('click',function() {
        $('#fromModalLabel').html('Tambah Data Karyawan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    
    $('.tampilModalUbah').on('click', function() {
        $('#fromModalLabel').html('Ubah Data Karyawan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        //  kita ambil tag form untun ubah data
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/karyawan/ubah');

        // membuat variable menggunakan const => this itu adalah tombol pada on click tombol manapun
        const id = $(this).data('id');
        

        // selanjutnya kita akan menjalankan ajaxanya untuk menjalankan ajax di jQuery itu menggunakan $.ajax()
        $.ajax({
            url: 'http://localhost/phpmvc/public/karyawan/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // lalu setelah kita mengubah dan bisa menampilkan data dengan format json kita bisa menampilkannya .val(data.nama); => untuk mengubah value dari nama data ke nama
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#email').val(data.email);
                $('#divisi').val(data.divisi);
                $('#id').val(data.id);
            }
        });
    });

});