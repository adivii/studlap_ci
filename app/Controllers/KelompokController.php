<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelompokModel;
use App\Models\MahasiswaModel;

class KelompokController extends BaseController
{
    public function index()
    {
        //
    }

    public function get_kelompok()
    {
        $result = "<option id=\"placeholder-kelompok\" selected>Pilih Kelompok</option>";

        $kelompok_model = new KelompokModel();

        $queryResult = $kelompok_model->findAll();

        if ($queryResult) {
            foreach ($queryResult as $row) {
                $result = $result . "<option value=\"".$row["id_kelompok"]."\">Kelompok ".$row["nama_kelompok"]."</option>";
            }
        }
        $result = $result . "<option value=\"other\">Lainnya</option>";

        echo $result;
    }

    public function get_kelompok_mahasiswa($key)
    {
        $model_kelompok = new KelompokModel();
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
                <td class=\"card-text-font\">Kelompok " . $model_kelompok->find($row["id_kelompok"])["nama_kelompok"] . "</td>
            </tr>
        ";
            }
        }

        echo $result;
    }
}
