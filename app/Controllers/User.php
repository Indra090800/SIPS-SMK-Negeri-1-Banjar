<?php

namespace App\Controllers;
use App\Models\ModelUser;

class User extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelUser = new ModelUser();
	}

	public function index()
	{
		$data = [
			'title'   => 'User',
			'user'    => $this->ModelUser->allData(),
			'isi'     => 'admin/v_user'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		 if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'username' => [
            'label' => 'Username',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'photo' => [
                'label' => 'Photo',
                'rules' => 'uploaded[photo]|max_size[photo,1024]|mime_in[photo,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajid Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('photo');
		 	//merename foto
		 		$nama_file = $photo->getRandomName();
		 		$data = array(
		 			'nama_user'  => $this->request->getPost('nama_user'),
					'username'   => $this->request->getPost('username'),
					'password'   => $this->request->getPost('password'),
					'photo'      => $nama_file, 
		 		);
		 		$photo->move('gambar', $nama_file);

				$this->ModelUser->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('user'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		 }
	}

	public function edit($id_user)
	{
		 if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'username' => [
            'label' => 'Username',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'photo' => [
                'label' => 'Photo',
                'rules' => 'max_size[photo,1024]|mime_in[photo,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('photo');

		 		if ($photo->getError() == 4) {
		 			$data = array(
		 			'id_user'    => $id_user,
		 			'nama_user'  => $this->request->getPost('nama_user'),
					'username'   => $this->request->getPost('username'),
					'password'   => $this->request->getPost('password'),
		 		);
		 			$this->ModelUser->edit($data);
		 		}else{
		 			$user = $this->ModelUser->detail_data($id_user);
		 			if ($user['photo']!= "") {
		 				unlink('gambar/'. $user['photo']);
		 			}
		 			//merename foto
			 		$nama_file = $photo->getRandomName();
			 		$data = array(
			 			'id_user'    => $id_user,
			 			'nama_user'  => $this->request->getPost('nama_user'),
						'username'   => $this->request->getPost('username'),
						'password'   => $this->request->getPost('password'),
						'photo'      => $nama_file, 
			 		);
			 		$photo->move('gambar', $nama_file);
					$this->ModelUser->edit($data);
		 		}
				session()->setFlashData('pesan','Data Berhasil Di Ganti !!');
				return redirect()->to(base_url('user'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		 }
	}

	public function delete($id_user)
	{
		$user = $this->ModelUser->detail_data($id_user);
		if ($user['photo'] != "") {
			unlink('gambar/'.$user['photo']);
		}
	    $data = [
			'id_user' => $id_user,
		];
		$this->ModelUser->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('user'));
	}
}