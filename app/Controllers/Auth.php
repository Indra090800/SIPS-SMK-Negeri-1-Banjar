<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

	public function index()
	{
		$data = [
			'title' => 'Login',
			'isi' => 'v_login'
		];
		return view('layout/v_wrapper',$data);
	}

    public function cek_login()
    {

        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
        ])) {
            $level    = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username,$password);
                if ($cek_user) {
                    session()->set('username',$cek_user['username']);
                    session()->set('nama',$cek_user['nama_user']);
                    session()->set('level',$level);
                    session()->set('photo',$cek_user['photo']);

                    return redirect()->to(base_url('admin'));
                }else{
                    session()->setFlashData('pesan', 'Login gagal!, Username atau Password salah !!');
                    return redirect()->to(base_url('auth'));
                }
            }elseif ($level == 2) {
                $cek_mhs = $this->ModelAuth->login_mhs($username,$password);
                if ($cek_mhs) {
                    session()->set('username',$cek_mhs['nim']);
                    session()->set('nama',$cek_mhs['nama_mhs']);
                    session()->set('level',$level);
                    session()->set('photo',$cek_mhs['foto_mhs']);

                    return redirect()->to(base_url('mhs'));
                }else{
                    session()->setFlashData('pesan', 'Login gagal!, Username atau Password salah !!');
                    return redirect()->to(base_url('auth'));
                }
            }elseif ($level == 3) {
                $cek_dosen = $this->ModelAuth->login_dosen($username,$password);
                if ($cek_dosen) {
                    session()->set('username',$cek_dosen['nidn']);
                    session()->set('nama',$cek_dosen['nama_dosen']);
                    session()->set('level',$level);
                    session()->set('photo',$cek_dosen['foto_dosen']);

                    return redirect()->to(base_url('mhs'));
                }else{
                    session()->setFlashData('pesan', 'Login gagal!, Username atau Password salah !!');
                    return redirect()->to(base_url('auth'));
                }
            }
        }else{
            session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('photo');
        session()->remove('level');
        session()->remove('nama');


        session()->setFlashData('sukses', 'Logout Sukses !!!');
        return redirect()->to(base_url('auth'));
    }
}