<?php
class Jadwal_maintenance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Maintenance',
            'meta' => 'jadwal maintenance',
            'menus' => 'jadwal_maintenance'
        ];
        $this->admin_template->view('backend/jadwal_maintenance/index', $data);
    }
}
