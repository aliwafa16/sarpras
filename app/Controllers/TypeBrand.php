<?php

namespace App\Controllers;

use \App\Models\BrandModel;
use \App\Models\TypeBrandModel;

class TypeBrand extends BaseController
{

    protected $modelBrand;
    public function __construct()
    {
        $this->modelBrand = new BrandModel();
        $this->modelTypeBrand = new TypeBrandModel();
    }
    public function index()
    {
        $data = array();
        $data['data'] = $this->modelTypeBrand->select('*')->join('tbl_brand', 'tbl_type_brand.brand_id = tbl_brand.id_brand')->findAll();
        $data['brand'] =  $this->modelBrand->findAll();
        $data = [
            'title' => 'Tipe Merek',
            'data' => $data

        ];
        return view('type_brand/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Merek',
        ];

        $this->modelTypeBrand->save(
            [
                'brand_id' => $this->request->getVar('brand_id'),
                'type' => $this->request->getVar('type')
            ]
        );
        session()->setFlashdata('message', 'Tipe Merek Berhasil Ditambahkan');
        return redirect()->to('TypeBrand');
    }

    public function edit($id = null)
    {
        $this->modelTypeBrand->save([
            'id_type_brand' => $id,
            'brand_id' => $this->request->getVar('brand_id'),
            'type' => $this->request->getVar('type')
        ]);
        session()->setFlashdata('message', 'Tipe Merek Berhasil Diubah');
        return redirect()->to('TypeBrand');
    }

    public function hapus($id = null)
    {
        $this->modelTypeBrand->delete($id);
        session()->setFlashdata('message', 'Tipe Merek Berhasil Dihapus');
        return redirect()->to('TypeBrand');
    }
}
