<?php

namespace App\Controllers;

use \App\Models\StatusModel;

class Status extends BaseController
{

    protected $modelStatus;
    public function __construct()
    {
        $this->modelStatus = new StatusModel();
    }
    public function index()
    {
        $data = $this->modelStatus->findAll();
        $data = [
            'title' => 'Status',
            'data' => $data

        ];
        return view('status/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Status'
        ];


        $this->modelStatus->save(['status' => $this->request->getVar('status')]);
        session()->setFlashdata('message', 'Status Berhasil Ditambahkan');
        return redirect()->to('Status');
    }

    public function edit($id = null)
    {
        $this->modelStatus->save([
            'id_status' => $id,
            'status' => $this->request->getVar('status')
        ]);
        session()->setFlashdata('message', 'Status Berhasil Diubah');
        return redirect()->to('Status');
    }

    public function hapus($id = null)
    {
        $this->modelStatus->delete($id);
        session()->setFlashdata('message', 'Status Berhasil Dihapus');
        return redirect()->to('Status');
    }
}
