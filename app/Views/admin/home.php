<?php

// session_start();

// if(!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")){
//     header("location: ../index.html");
// }

?>

<?= $this->extend('templates/admin-template') ?>

<?= $this->section('content') ?>

<!-- Code Here -->

<div class="container" style="margin-top: 120px;">
  <div class="container row position-relative sm-show" style="height: 80px; display: none;">
    <!-- <img class="img h-auto position-absolute top-50 start-50 translate-middle" src="res/Logo_UnivLampung.png" alt="" style="width: 90px;"> -->
    <div class="container-fluid p-0 position-absolute top-50 start-50 translate-middle" style="width: 150px; height: 80px; border-radius: 35px 10px; overflow: hidden; box-shadow: 2px 2px 5px var(--white-color);">
      <img class="img w-100" src="res/pexels-olia-danilevich-4974912.jpg" alt="">
    </div>
  </div>
  <div class="container row">
    <div class="col-sm-4 col position-relative">
      <div class="container card-image-container-home p-0 position-absolute top-50 start-50 translate-middle sm-hidden" style="border-radius: 60px 20px; overflow: hidden;">
        <img class="img w-100" src="/assets/res/pexels-olia-danilevich-4974912.jpg" alt="">
      </div>
    </div>
    <div class="col-md-8 col-12 card-container-home">
      <div class="card border-0 sm-text-center text-start text-light bg-transparent">
        <div class="card-body">
          <h1 class="card-title h1 card-title-font" style="font-size: 1.8rem;">ADMIN STUDI LAPANGAN</h1>
          <p class="card-text card-text-font" style="font-size: 1rem;">Halaman ini digunakan sebagai akses panitia dalam mengelola informasi seputar Studi Lapangan.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>