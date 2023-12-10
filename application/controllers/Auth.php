<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        if ($is_login) {
            redirect('Dashboard');
        }
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Halaman Login';
        $this->load->view('backend/auth/index', $data);
    }

    public function login()
    {
        $response = [];
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        $cekUser = $this->db->get_where('tbl_user', ['username' => $this->input->post('username')])->row_array();

        if ($cekUser) {
            if (password_verify($password, $cekUser['password'])) {
                $data_session = [
                    'username' => $cekUser['username'],
                    'id_user' => $cekUser['id_user'],
                    'biodata_id' => $cekUser['biodata_id'],
                    'email' => $cekUser['email'],
                    'date_login' => date('Y-m-d'),
                    'is_login' => true
                ];
                $this->session->set_userdata($data_session);
                $response = ['code' => 200, 'status' => false, 'data' => $cekUser, 'message' => 'Berhasil login'];
            } else {
                $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
            }
        } else {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
        }

        echo json_encode($response);
    }

    public function logout()
    {
        session_destroy();
        redirect('Auth');
    }
}
