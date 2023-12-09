<?php

namespace App\Controllers;

use \App\Models\BrandModel;

class Brand extends BaseController
{

    protected $modelBrand;
    public function __construct()
    {
        $this->modelBrand = new BrandModel();
    }
    public function index()
    {
        $data = $this->modelBrand->findAll();
        $data = [
            'title' => 'Merek',
            'data' => $data

        ];
        return view('Brand/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Merek'
        ];


        $this->modelBrand->save(['brand' => $this->request->getVar('brand')]);
        session()->setFlashdata('message', 'Merek Berhasil Ditambahkan');
        return redirect()->to('Brand');
    }

    public function edit($id = null)
    {
        $this->modelBrand->save([
            'id_brand' => $id,
            'brand' => $this->request->getVar('brand')
        ]);
        session()->setFlashdata('message', 'Merek Berhasil Diubah');
        return redirect()->to('Brand');
    }

    public function hapus($id = null)
    {
        $this->modelBrand->delete($id);
        session()->setFlashdata('message', 'Merek Berhasil Dihapus');
        return redirect()->to('Brand');
    }
}
