<?php

namespace App\Controllers;

use \App\Models\CategoryModel;

class Category extends BaseController
{

    protected $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
    }
    public function index()
    {
        $data = $this->modelCategory->findAll();
        $data = [
            'title' => 'Kategori',
            'data' => $data

        ];
        return view('category/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kategori'
        ];


        $this->modelCategory->save(['category' => $this->request->getVar('category')]);
        session()->setFlashdata('message', 'Kategori Berhasil Ditambahkan');
        return redirect()->to('Category');
    }

    public function edit($id = null)
    {
        $this->modelCategory->save([
            'id_category' => $id,
            'category' => $this->request->getVar('category')
        ]);
        session()->setFlashdata('message', 'Kategori Berhasil Diubah');
        return redirect()->to('Category');
    }

    public function hapus($id = null)
    {
        $this->modelCategory->delete($id);
        session()->setFlashdata('message', 'Kategori Berhasil Dihapus');
        return redirect()->to('Category');
    }
}
