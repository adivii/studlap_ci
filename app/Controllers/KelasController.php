<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class KelasController extends BaseController
{
    public function index()
    {
        //
    }

    public function get_kelas()
    {
        $result = "<option id=\"placeholder-kelas\" selected>Pilih Kelas</option>";

        $kelas_model = new KelasModel();

        $queryResult = $kelas_model->findAll();

        if ($queryResult) {
            foreach ($queryResult as $row) {
                $result = $result . "<option value=\"" . $row["id_kelas"] . "\">" . $row["nama_kelas"] . "</option>";
            }
        }
        $result = $result . "<option value=\"other\">Lainnya</option>";

        echo $result;
    }
}
