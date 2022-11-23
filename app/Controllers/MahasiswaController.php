<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusModel;
use App\Models\KamarModel;
use App\Models\KelasModel;
use App\Models\KelompokModel;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    public function index()
    {
        return view('user/home');
    }

    public function list_bus()
    {
        return view('user/list-bus');
    }

    public function list_kamar()
    {
        return view('user/list-kamar');
    }

    public function list_kelompok()
    {
        return view('user/list-kelompok');
    }

    public function save()
    {
        $mahasiswa_model = new MahasiswaModel();

        $data = [
            'npm_mhs' => $this->request->getPost('mhs-npm'),
            'nama_mhs' => $this->request->getPost('mhs-name'),
            'kelas_mhs' => $this->request->getPost('mhs-kelas'),
            'id_bus' => $this->request->getPost('bus-id'),
            'no_seat' => $this->request->getPost('seat-number'),
            'id_kamar' => $this->request->getPost('kamar-id'),
            'id_kelompok' => $this->request->getPost('kelompok-id'),
        ];

        if ($data['npm_mhs'] === "" || $data['nama_mhs'] === "" || $data['kelas_mhs'] === "Pilih Kelas" || $data['id_bus'] === "Pilih Bus" || $data['no_seat'] === "" || $data['id_kamar'] === "Pilih Kamar" || $data['id_kelompok'] === "Pilih Kelompok") {
            echo "<script>window.alert(\"Input Gagal\")</script>";
            return redirect()->to('/admin/create/mahasiswa');
        }

        // Input Kelas Jika Belum Ada
        if ($data['kelas_mhs'] == "other") {
            $kelas_other['nama_kelas'] = $this->request->getPost('kelas-other');

            if ($kelas_other['nama_kelas'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kelas_model = new KelasModel();
                $result = $kelas_model->save($kelas_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['kelas_mhs'] = $kelas_model->where('nama_kelas', $kelas_other['nama_kelas'])->findAll()[0]["id_kelas"];
                }
            }
        }

        // Input Bus Jika Belum Ada
        if ($data['id_bus'] === "other") {
            $bus_other['nama_bus'] = $this->request->getPost('bus-other');

            if ($bus_other['nama_bus'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $bus_model = new BusModel();
                $result = $bus_model->save($bus_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_bus'] = $bus_model->where('nama_bus', $bus_other['nama_bus'])->findAll()[0]['id_bus'];
                }
            }
        }

        // Input Kamar Jika Belum Ada
        if ($data['id_kamar'] === "other") {
            $kamar_other['nomor_kamar'] = $this->request->getPost('kamar-other');

            if ($kamar_other['nomor_kamar'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kamar_model = new KamarModel();
                $result = $kamar_model->save($kamar_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_kamar'] = $kamar_model->where('nomor_kamar', $kamar_other['nomor_kamar'])->findAll()[0]['id_kamar'];
                }
            }
        }

        // Input Kelompok Jika Belum Ada
        if ($data['id_kelompok'] === "other") {
            $kelompok_other['nama_kelompok'] = $this->request->getPost('kelompok-other');

            if ($kelompok_other['nama_kelompok'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kelompok_model = new KelompokModel();
                $result = $kelompok_model->save($kelompok_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_kelompok'] = $kelompok_model->where('nama_kelompok', $kelompok_other['nama_kelompok'])->findAll()[0]['id_kelompok'];
                }
            }
        }

        if ($mahasiswa_model->find($data['npm_mhs']) && count($mahasiswa_model->find($data['npm_mhs'])) > 0) {
            echo "<script>window.alert(\"Input Gagal\")</script>";
            return redirect()->to('/admin/create/mahasiswa');
        }

        $result = $mahasiswa_model->save($data);

        if ($result) {
            echo "<script>window.alert(\"Input Sukses\")</script>";
            return redirect()->to('/admin/list/mahasiswa');
        } else {
            echo "<script>window.alert(\"Input Gagal\")</script>";
            return redirect()->to('/admin/create/mahasiswa');
        }
    }

    public function update()
    {
        $mahasiswa_model = new MahasiswaModel();

        $data = [
            'npm_mhs' => $this->request->getPost('mhs-npm'),
            'nama_mhs' => $this->request->getPost('mhs-name'),
            'kelas_mhs' => $this->request->getPost('mhs-kelas'),
            'id_bus' => $this->request->getPost('bus-id'),
            'no_seat' => $this->request->getPost('seat-number'),
            'id_kamar' => $this->request->getPost('kamar-id'),
            'id_kelompok' => $this->request->getPost('kelompok-id'),
        ];

        if ($data['npm_mhs'] === "" || $data['nama_mhs'] === "" || $data['kelas_mhs'] === "Pilih Kelas" || $data['id_bus'] === "Pilih Bus" || $data['no_seat'] === "" || $data['id_kamar'] === "Pilih Kamar" || $data['id_kelompok'] === "Pilih Kelompok") {
            echo "<script>window.alert(\"Input Gagal\")</script>";
            return redirect()->to('/admin/create/mahasiswa');
        }

        // Input Kelas Jika Belum Ada
        if ($data['kelas_mhs'] == "other") {
            $kelas_other['nama_kelas'] = $this->request->getPost('kelas-other');

            if ($kelas_other['nama_kelas'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kelas_model = new KelasModel();
                $result = $kelas_model->save($kelas_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['kelas_mhs'] = $kelas_model->where('nama_kelas', $kelas_other['nama_kelas'])->findAll()[0]["id_kelas"];
                }
            }
        }

        // Input Bus Jika Belum Ada
        if ($data['id_bus'] === "other") {
            $bus_other['nama_bus'] = $this->request->getPost('bus-other');

            if ($bus_other['nama_bus'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $bus_model = new BusModel();
                $result = $bus_model->save($bus_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_bus'] = $bus_model->where('nama_bus', $bus_other['nama_bus'])->findAll()[0]['id_bus'];
                }
            }
        }

        // Input Kamar Jika Belum Ada
        if ($data['id_kamar'] === "other") {
            $kamar_other['nomor_kamar'] = $this->request->getPost('kamar-other');

            if ($kamar_other['nomor_kamar'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kamar_model = new KamarModel();
                $result = $kamar_model->save($kamar_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_kamar'] = $kamar_model->where('nomor_kamar', $kamar_other['nomor_kamar'])->findAll()[0]['id_kamar'];
                }
            }
        }

        // Input Kelompok Jika Belum Ada
        if ($data['id_kelompok'] === "other") {
            $kelompok_other['nama_kelompok'] = $this->request->getPost('kelompok-other');

            if ($kelompok_other['nama_kelompok'] == "") {
                echo "<script>window.alert(\"Input Gagal\")</script>";
                return redirect()->to('/admin/create/mahasiswa');
            } else {
                $kelompok_model = new KelompokModel();
                $result = $kelompok_model->save($kelompok_other);

                if (!$result) {
                    echo "<script>window.alert(\"Input Gagal\")</script>";
                    return redirect()->to('/admin/create/mahasiswa');
                } else {
                    $data['id_kelompok'] = $kelompok_model->where('nama_kelompok', $kelompok_other['nama_kelompok'])->findAll()[0]['id_kelompok'];
                }
            }
        }

        $result = $mahasiswa_model->update($data['npm_mhs'], $data);

        if ($result) {
            echo "<script>window.alert(\"Input Sukses\")</script>";
            return redirect()->to('/admin/list/mahasiswa');
        } else {
            echo "<script>window.alert(\"Input Gagal\")</script>";
            return redirect()->to('/admin/create/mahasiswa');
        }
    }

    public function delete($id)
    {
        $mahasiswa_model = new MahasiswaModel();

        $mahasiswa_model->delete($id);
        
        return redirect()->to('/admin/list/mahasiswa');
    }
}
