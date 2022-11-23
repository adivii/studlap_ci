<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KamarModel;
use App\Models\MahasiswaModel;

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

    public function get_kamar_mahasiswa($key)
    {
        $model_kamar = new KamarModel();
        $model_mhs = new MahasiswaModel();

        $result = "";

        if ($key === "-") {
            $queryResult = $model_mhs->findAll();
        } else {
            $queryResult = $model_mhs->like('npm_mhs', $key)->orlike('nama_mhs', $key)->findAll();
        }

        if ($queryResult) {
            foreach($queryResult as $row) {
                $result = $result . "
            <tr>
                <td class=\"card-text-font\">" . $row["npm_mhs"] . "</td>
                <td class=\"card-text-font\">" . $row["nama_mhs"] . "</td>
                <td class=\"card-text-font\">Kamar " . $model_kamar->find($row["id_kamar"])["nomor_kamar"] . "</td>
            </tr>
        ";
            }
        }

        echo $result;
    }
}
