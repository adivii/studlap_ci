<?= $this->extend('templates/user-template') ?>

<?= $this->section('header') ?>
<script>
    function change(key) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Write success action here
                document.getElementById("kamar-data").innerHTML = this.responseText;
            };
        };

        xmlhttp.open("GET", "/user/get/kamar/" + key, true);
        xmlhttp.send();
    }

    change("");
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto mt-4 px-0 w-75">
    <input type="text" class="form-control card-text-font" id="search" placeholder="Cari" onkeyup="change(this.value)">

    <table class="table table-responsive table-dark table-bordered mt-2">
        <thead>
            <tr>
                <!-- <th scope="col" class="card-text-font">No</th> -->
                <th scope="col" class="card-text-font text-center">NPM</th>
                <th scope="col" class="card-text-font text-center">Nama</th>
                <th scope="col" class="card-text-font text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody id="kamar-data">

        </tbody>
    </table>
</div>

<?= $this->endSection() ?>