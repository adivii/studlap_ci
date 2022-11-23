<?= $this->extend('templates/admin-template') ?>

<?= $this->section('content') ?>

<!-- Code Here -->

<?php

use App\Models\BusModel;
use App\Models\KamarModel;
use App\Models\KelasModel;
use App\Models\KelompokModel;

$bus_model = new BusModel();
$kamar_model = new KamarModel();
$kelas_model = new KelasModel();
$kelompok_model = new KelompokModel();

?>

<div class="container w-75 mx-auto mt-2">
  <!-- <input type="text" class="form-control card-text-font" id="search" placeholder="Cari" onkeyup="load_data(this.value)"> -->

  <table class="table table-responsive table-dark table-bordered mt-2">
    <thead>
      <tr>
        <!-- <th scope="col" class="card-text-font">No</th> -->
        <th scope="col" class="card-text-font">NPM</th>
        <th scope="col" class="card-text-font">Nama</th>
        <th scope="col" class="card-text-font">Kelas</th>
        <th scope="col" class="card-text-font">Bus</th>
        <th scope="col" class="card-text-font">Seat</th>
        <th scope="col" class="card-text-font">Kamar</th>
        <th scope="col" class="card-text-font">Kelompok</th>
        <th scope="col" class="card-text-font">Operasi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mahasiswa as $mhs) { ?>
        <tr>
          <td><?= $mhs['npm_mhs'] ?></td>
          <td><?= $mhs['nama_mhs'] ?></td>
          <td><?= $kelas_model->find($mhs['kelas_mhs'])['nama_kelas'] ?></td>
          <td>Bus <?= $bus_model->find($mhs['id_bus'])['nama_bus'] ?></td>
          <td><?= $mhs['no_seat'] ?></td>
          <td>Kamar <?= $kamar_model->find($mhs['id_kamar'])['nomor_kamar'] ?></td>
          <td>Kelompok <?= $kelompok_model->find($mhs['id_kelompok'])['nama_kelompok'] ?></td>
          <td>
            <a href="/admin/edit/mahasiswa/<?= $mhs['npm_mhs'] ?>">
              <button type="button" class="btn btn-primary">Edit</button>
            </a>
            <form action="/admin/delete/mahasiswa/<?= $mhs['npm_mhs'] ?>" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>