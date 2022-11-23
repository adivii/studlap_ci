<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelompokModel;

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
}
