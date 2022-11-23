<?= $this->extend('templates/admin-template') ?>

<?= $this->section('header') ?>

<script>
    function load_kelas() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mhs-kelas").innerHTML = this.responseText;
            };
        };

        xmlhttp.open("GET", "/admin/get/kelas", true);
        xmlhttp.send();
    }

    function load_bus() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("bus-id").innerHTML = this.responseText;
            };
        };

        xmlhttp.open("GET", "/admin/get/bus", true);
        xmlhttp.send();
    }

    function load_kamar() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kamar-id").innerHTML = this.responseText;
            };
        };

        xmlhttp.open("GET", "/admin/get/kamar", true);
        xmlhttp.send();
    }

    function load_kelompok() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kelompok-id").innerHTML = this.responseText;
            };
        };

        xmlhttp.open("GET", "/admin/get/kelompok", true);
        xmlhttp.send();
    }

    function kelas_changed() {
        var kelas = document.getElementById("mhs-kelas").value;

        if (kelas == "other") {
            document.getElementById("kelas-other").style.display = "block";
        } else {
            document.getElementById("kelas-other").style.display = "none";
        }

        document.getElementById("placeholder-kelas").style.display = "none";
    }

    function bus_changed() {
        var kelas = document.getElementById("bus-id").value;

        if (kelas == "other") {
            document.getElementById("bus-other").style.display = "block";
        } else {
            document.getElementById("bus-other").style.display = "none";
        }

        document.getElementById("placeholder-bus").style.display = "none";
    }

    function kamar_changed() {
        var kelas = document.getElementById("kamar-id").value;

        if (kelas == "other") {
            document.getElementById("kamar-other").style.display = "block";
        } else {
            document.getElementById("kamar-other").style.display = "none";
        }

        document.getElementById("placeholder-kamar").style.display = "none";
    }

    function kelompok_changed() {
        var kelas = document.getElementById("kelompok-id").value;

        if (kelas == "other") {
            document.getElementById("kelompok-other").style.display = "block";
        } else {
            document.getElementById("kelompok-other").style.display = "none";
        }

        document.getElementById("placeholder-kelompok").style.display = "none";
    }

    load_kelas();
    load_bus();
    load_kamar();
    load_kelompok();
</script>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Code Here -->

<div class="container w-75 mx-auto mt-2">
    <form action="/admin/save/mahasiswa" method="post">
        <div class="mb-3">
            <label for="mhs-npm" class="form-label text-light">NPM Mahasiswa</label>
            <input type="text" class="form-control" id="mhs-npm" name="mhs-npm">
        </div>
        <div class="mb-3">
            <label for="mhs-name" class="form-label text-light">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="mhs-name" name="mhs-name">
        </div>
        <div class="mb-3">
            <label for="mhs-kelas" class="form-label text-light">Kelas Mahasiswa</label>
            <select name="mhs-kelas" id="mhs-kelas" class="form-select" placeholder="Pilih Kelas" onchange="kelas_changed()"></select>
            <input class="form-control mt-2" type="text" name="kelas-other" id="kelas-other" placeholder="Kelas" style="display: none">
        </div>
        <div class="mb-3">
            <label for="bus-id" class="form-label text-light">Bus</label>
            <select name="bus-id" id="bus-id" class="form-select" onchange="bus_changed()"></select>
            <input class="form-control mt-2" type="number" name="bus-other" id="bus-other" placeholder="Bus" style="display: none">
            <input class="form-control mt-2" type="number" name="seat-number" id="seat-number" placeholder="Nomor Seat">
        </div>
        <div class="mb-3">
            <label for="kamar-id" class="form-label text-light">Kamar</label>
            <select name="kamar-id" id="kamar-id" class="form-select" onchange="kamar_changed()"></select>
            <input class="form-control mt-2" type="number" name="kamar-other" id="kamar-other" placeholder="Nomor Kamar" style="display: none">
        </div>
        <div class="mb-3">
            <label for="kelompok-id" class="form-label text-light">Kelompok</label>
            <select name="kelompok-id" id="kelompok-id" class="form-select" onchange="kelompok_changed()"></select>
            <input class="form-control mt-2" type="number" name="kelompok-other" id="kelompok-other" placeholder="Nomor Kelompok" style="display: none">
        </div>
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>