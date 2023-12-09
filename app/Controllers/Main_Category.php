<?php

namespace App\Controllers;

use \App\Models\MainCategoryModel;

class Main_Category extends BaseController
{

    protected $modelMainCategory;
    public function __construct()
    {
        $this->modelMainCategory = new MainCategoryModel();
    }
    public function index()
    {
        $data = $this->modelMainCategory->findAll();
        $data = [
            'title' => 'Main Kategori',
            'data' => $data

        ];
        return view('main_category/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Main Kategori'
        ];


        $this->modelMainCategory->save(['main_category' => $this->request->getVar('main_category')]);
        session()->setFlashdata('message', 'Main Kategori Berhasil Ditambahkan');
        return redirect()->to('Main_Category');
    }

    public function edit($id = null)
    {
        $this->modelMainCategory->save([
            'id_main_category' => $id,
            'main_category' => $this->request->getVar('main_category')
        ]);
        session()->setFlashdata('message', 'Main Kategori Berhasil Diubah');
        return redirect()->to('Main_Category');
    }

    public function hapus($id = null)
    {
        $this->modelMainCategory->delete($id);
        session()->setFlashdata('message', 'Main Kategori Berhasil Dihapus');
        return redirect()->to('Main_Category');
    }
}
