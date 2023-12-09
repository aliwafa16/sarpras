<?php

namespace App\Controllers;

use \App\Models\ConditionModel;

class Condition extends BaseController
{

    protected $modelCondition;
    public function __construct()
    {
        $this->modelCondition = new ConditionModel();
    }
    public function index()
    {
        $data = $this->modelCondition->findAll();
        $data = [
            'title' => 'Kondisi',
            'data' => $data

        ];
        return view('condition/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kondisi'
        ];


        $this->modelCondition->save(['condition' => $this->request->getVar('condition')]);
        session()->setFlashdata('message', 'Kondisi Berhasil Ditambahkan');
        return redirect()->to('Condition');
    }

    public function edit($id = null)
    {
        $this->modelCondition->save([
            'id_condition' => $id,
            'condition' => $this->request->getVar('condition')
        ]);
        session()->setFlashdata('message', 'Kondisi Berhasil Diubah');
        return redirect()->to('Condition');
    }

    public function hapus($id = null)
    {
        $this->modelCondition->delete($id);
        session()->setFlashdata('message', 'Kondisi Berhasil Dihapus');
        return redirect()->to('Condition');
    }
}
