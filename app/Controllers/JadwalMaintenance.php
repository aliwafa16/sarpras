<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetsModel;
use App\Models\JadwalMaintenanceModel;
use PHPUnit\Util\Json;

class JadwalMaintenance extends BaseController
{
    protected $assetsModel;
    protected $jadwalmaintenanceModel;
    public function __construct()
    {
        $this->assetsModel = new AssetsModel();
        $this->jadwalmaintenanceModel = new JadwalMaintenanceModel();
    }
    public function index()
    {
        $assets = $this->assetsModel->findAll();
        $data = [
            'title' => 'Jadwal Maintenance',
            'assets' => $assets

        ];
        return view('jadwal_maintenance/index', $data);
    }

    public function load()
    {
        $data = $this->jadwalmaintenanceModel->select('assets.name_assets, tbl_jadwalmaintenance.*')->join('tbl_assets assets', 'assets.id_assets=tbl_jadwalmaintenance.assets_id', 'left')->findAll();
        $final = [];
        foreach ($data as $key) {
            $row = array();
            $row['title'] = $key['name_assets'];
            $row['start'] = $key['start_date'];
            $row['end'] = $key['end_date'];
            $row['id'] = $key['id_jadwalmaintenance'];

            $final[] = $row;
        }

        return $this->response->setJSON($final, true);
    }

    public function tambah()

    {
        $data = [
            'assets_id' => $this->request->getVar('assets_id'),
            'start_date' => $this->request->getVar('start_date'),
            'end_date' => date('Y-m-d', strtotime($this->request->getVar('end_date') . '+1 day')),
            'update_assets' => $this->request->getVar('update_assets'),
            'set_monthly' => $this->request->getVar('set_monthly'),
            'created_by' => session()->get('username')
        ];
        $this->jadwalmaintenanceModel->save($data);

        session()->setFlashdata('message', 'Jadwal Maintenance Berhasil Ditambahkan');
        return redirect()->to('JadwalMaintenance');
    }

    public function hapus($id)
    {
        $checkJadwal = $this->jadwalmaintenanceModel->find($id);
        if ($checkJadwal) {
            $this->jadwalmaintenanceModel->delete($id);
            session()->setFlashdata('message', 'Jadwal Maintenance Berhasil Dihapus');
            echo json_encode(['status' => 200, 'msg' => 'Jadwal Maintenance Berhasil Dihapus']);
        }
    }

    public function getJadwal($id)
    {
        $data =  array();
        $data['jadwal'] = $this->jadwalmaintenanceModel->find($id);
        $data['assets'] = $this->assetsModel->findAll();

        echo json_encode($data);
    }

    public function eventResize()
    {
        $data = [
            'id_jadwalmaintenance' => $this->request->getVar('id'),
            // 'assets_id' => $this->request->getVar('assets_id'),
            'start_date' => $this->request->getVar('start'),
            'end_date' => date('Y-m-d', strtotime($this->request->getVar('end') . '+1 day')),
            // 'update_assets' => $this->request->getVar('update_assets'),
            // 'set_monthly' => $this->request->getVar('set_monthly'),
            // 'created_by' => session()->get('username')
        ];

        var_dump($data);
    }
}
