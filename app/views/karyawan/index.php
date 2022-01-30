<div class="container" mt-3>
  <!-- tambahkan nottifikasi flashingnya di atas tmobol tambah -->
  <div class="row">
    <div class="col-lg-6">
      <!-- di panggil class flasher dan method flass karena method static memnggilnya cuman menggunakan :: -->
      <?php Flasher::flash() ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#fromModal">
        Tambah Data Dosen
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL;; ?>/karyawan/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Karyawan" name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="coll-lg-6">
        <h1>Daftar Dosen</h1>
        <ul class="list-group">
          <?php foreach ($data['kryw'] as $kryw) : ?>
            <li class="list-group-item">
              <?= $kryw['nama']; ?>
              <a href="<?= BASEURL; ?>/karyawan/hapus/ <?= $kryw['id']; ?>" class="badge bg-danger float-end m-2" onclick="return confirm('Apakah anda yakin akan menghapus ini?');">Delete</a>
              <a href="<?= BASEURL; ?>/karyawan/ubah/ <?= $kryw['id']; ?>" class="badge bg-success float-end m-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#fromModal" data-id="<?= $kryw['id']; ?>">Edit</a>
              <a href="<?= BASEURL; ?>/karyawan/detail/ <?= $kryw['id']; ?>" class="badge bg-primary float-end m-2">Detail</a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="fromModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fromModalLabel">Tambah Data Dosen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Membuat tampilan id akan tetapi kita ubah menjadi hiden tidak terlihat oleh user -->

          <form action="<?= BASEURL; ?>/karyawan/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
              <label for="npm" class="form-label">Npm</label>
              <input type="number" class="form-control" id="npm" name="npm">
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
              <label for="divisi">Divisi</label>
              <select class="form-control" id="divisi" name="divisi">
                <option value="Statistic">Statistic</option>
                <option value="Pemrograman">Pemrograman Web</option>
                <option value="Komunikasi Data">Komunikasi Data</option>
                <option value="Basis Data">Basis Data</option>
                <option value="Kewirausahaan">Kewirausahaan</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
          <!--  ttup from di simpan di bawah button karena nnti button bagian dari form -->
          </form>
        </div>
      </div>
    </div>
  </div>