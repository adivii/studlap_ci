<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KamarModel;

class KamarController extends BaseController
{
    public function index()
    {
        //
    }

    public function get_kamar()
    {
        $result = "<option id=\"placeholder-kamar\" selected>Pilih Kamar</option>";

        $kamar_model = new KamarModel();
        $queryResult = $kamar_model->findAll();

        if ($queryResult) {
            foreach ($queryResult as $row) {
                $result = $result . "
            <option value=\"" . $row["id_kamar"] . "\">Kamar " . $row["nomor_kamar"] . "</option>
        ";
            }
        }
        $result = $result . "<option value=\"other\">Lainnya</option>";

        echo $result;
    }

    public function get_kamar_mahasiswa()
    {
        include './connection.php';

        $key = $_GET["key"];
        $result = "";

        if ($key === "") {
            $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kamar`.`nomor_kamar`
                FROM `mahasiswa`, `kamar`
                WHERE `mahasiswa`.`id_kamar`=`kamar`.`id_kamar`
                ORDER BY `mahasiswa`.`npm_mhs`;";
        } else {
            $query = "SELECT `mahasiswa`.`npm_mhs`, `mahasiswa`.`nama_mhs`, `kamar`.`nomor_kamar`
                FROM `mahasiswa`, `kamar`
                WHERE ((`mahasiswa`.`npm_mhs` LIKE '%$key%') OR (`mahasiswa`.`nama_mhs` LIKE '%$key%') OR (CONCAT('Kamar ', `kamar`.`nomor_kamar`) LIKE '%$key%')) AND `mahasiswa`.`id_kamar`=`kamar`.`id_kamar`
                ORDER BY `mahasiswa`.`npm_mhs`;";
        }

        $queryResult = mysqli_query($conn, $query);

        if (mysqli_num_rows($queryResult) > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $result = $result . "
            <tr>
                <td class=\"card-text-font\">" . $row["npm_mhs"] . "</td>
                <td class=\"card-text-font\">" . $row["nama_mhs"] . "</td>
                <td class=\"card-text-font\">Kamar " . $row["nomor_kamar"] . "</td>
            </tr>
        ";
            }
        }

        echo $result;
    }
}
