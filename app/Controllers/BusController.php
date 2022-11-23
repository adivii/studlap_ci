<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusModel;
use App\Models\MahasiswaModel;

class BusController extends BaseController
{
    public function index()
    {
        //
    }

    public function get_bus()
    {
        $result = "<option id=\"placeholder-bus\" selected>Pilih Bus</option>";

        $bus_model = new BusModel();

        $queryResult = $bus_model->findAll();

        if ($queryResult) {
            foreach ($queryResult as $row) {
                $result = $result . "<option value=\"" . $row["id_bus"] . "\">Bus " . $row["nama_bus"] . "</option>";
            }
        }
        $result = $result . "<option value=\"other\">Lainnya</option>";

        echo $result;
    }

    public function get_bus_mahasiswa($key)
    {
        $result = "";

        $model_mhs = new MahasiswaModel();
        $model_bus = new BusModel();

        if ($key === "-") {
            $query_result = $model_mhs->findAll();
        } else {
            $query_result = $model_mhs->like('npm_mhs', $key)->orlike('nama_mhs', $key)->findAll();
        }

        if ($query_result) {
            foreach($query_result as $row) {
                $result = $result . "
            <tr>
                <td class=\"card-text-font\">" . $row["npm_mhs"] . "</td>
                <td class=\"card-text-font\">" . $row["nama_mhs"] . "</td>
                <td class=\"card-text-font\">Bus " . $model_bus->find($row['id_bus'])["nama_bus"] . "</td>
            </tr>
        ";
            }
        }

        echo $result;
    }
}
