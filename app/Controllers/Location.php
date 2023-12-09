<?php

namespace App\Controllers;

use \App\Models\LocationModel;

class Location extends BaseController
{

    protected $modelLocation;
    public function __construct()
    {
        $this->modelLocation = new LocationModel();
    }
    public function index()
    {
        $data = $this->modelLocation->findAll();
        $data = [
            'title' => 'Lokasi',
            'data' => $data

        ];
        return view('location/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Lokasi'
        ];


        $this->modelLocation->save(['location' => $this->request->getVar('location')]);
        session()->setFlashdata('message', 'Lokasi Berhasil Ditambahkan');
        return redirect()->to('Location');
    }

    public function edit($id = null)
    {
        $this->modelLocation->save([
            'id_location' => $id,
            'location' => $this->request->getVar('location')
        ]);
        session()->setFlashdata('message', 'Lokasi Berhasil Diubah');
        return redirect()->to('Location');
    }

    public function hapus($id = null)
    {
        $this->modelLocation->delete($id);
        session()->setFlashdata('message', 'Lokasi Berhasil Dihapus');
        return redirect()->to('Location');
    }
}
