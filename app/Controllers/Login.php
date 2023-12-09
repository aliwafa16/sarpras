<?php

namespace App\Controllers;

use App\Models\UserModel;


class Login extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new UserModel();
    }
    public function index()
    {
        return view('login/index');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $this->modelUser->where('username', $username)->first();

        if (!$data) {
            session()->setFlashdata('message', 'Username Tidak Ditemukan !');
            return redirect()->to('/');
        } else {
            $cek_password = password_verify($password, $data['password']);

            if ($cek_password) {
                $data_session = [
                    'username'  => $data['username'],
                    'email'     => $data['email'],
                    'biodata_id' => $data['biodata_id'],
                    'logged_in' => true,
                ];
                session()->set($data_session);
                return redirect()->to('/Dashboard');
            } else {
                session()->setFlashdata('message', 'Password Salah !');
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
