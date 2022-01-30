<div class="container mt-5">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $data['kryw']['nama']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $data['kryw']['npm']; ?></h6>
    <p class="card-text"><?= $data['kryw']['email']; ?></p>
    <p class="card-text"><?= $data['kryw']['divisi']; ?></p>
    <a href="<?= BASEURL; ?>/karyawan" class="card-link">Kembali</a>
  </div>
</div>
</div>