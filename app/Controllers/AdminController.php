<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/home');
    }

    public function show_mhs()
    {
        $model = new MahasiswaModel();
        $mahasiswa = $model->findall();

        $data = [
            'mahasiswa' => $mahasiswa
        ];

        return view('admin/list-mhs', $data);
    }
    
    public function add_mhs()
    {
        return view('admin/add-mhs');
    }

    public function edit_mhs($id)
    {
        $mahasiswa_model = new MahasiswaModel();
        
        $data['mhs'] = $mahasiswa_model->find($id);

        return view('admin/edit-mhs', $data);
    }
}
