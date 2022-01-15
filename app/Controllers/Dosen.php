<?php

namespace App\Controllers;
use App\Models\ModelDosen;
use App\Models\ModelJadwalKuliah;


class Dosen extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelDosen = new ModelDosen();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
	}

	public function index()
	{
		$data = [
			'title'    => 'Guru',
			'dosen'    => $this->ModelDosen->allData(),	
			'isi'      => 'admin/dosen/v_dosen'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add Guru',
			'isi'   => 'admin/dosen/v_add'
		];
		return view('layout/v_wrapper',$data);
	}

	public function insert()
	{
		if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'nidn' => [
            'label' => 'NIP',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'nama_dosen' => [
            'label' => 'Nama Guru',
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
            'foto_dosen' => [
                'label' => 'Photo',
                'rules' => 'uploaded[foto_dosen]|max_size[foto_dosen,1024]|mime_in[foto_dosen,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajid Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('foto_dosen');
		 	//merename foto
		 		$nama_file = $photo->getRandomName();
		 		$data = array(
		 			'kode_dosen'    => $this->request->getPost('kode_dosen'),
					'nidn'   		=> $this->request->getPost('nidn'),
					'nama_dosen'   	=> $this->request->getPost('nama_dosen'),
					'password'      => $this->request->getPost('password'),
					'foto_dosen'    => $nama_file, 
		 		);
		 		$photo->move('fotodosen', $nama_file);

				$this->ModelDosen->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('dosen'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/add'));
		 }
	}

	public function edit($id_dosen)
	{
		$data = [
			'title' => 'Edit Guru',
			'dosen' => $this->ModelDosen->detailData($id_dosen),
			'isi'   => 'admin/dosen/v_edit'
		];
		return view('layout/v_wrapper',$data);
	}

	public function update($id_dosen)
	{
		if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'nidn' => [
            'label' => 'NIP',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'nama_dosen' => [
            'label' => 'Nama Guru',
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
            'foto_dosen' => [
                'label' => 'Photo Dosen',
                'rules' => 'max_size[foto_dosen,1024]|mime_in[foto_dosen,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('foto_dosen');

		 		if ($photo->getError() == 4) {
		 			$data = array(
		 			'id_dosen'    => $id_dosen,
		 			'kode_dosen'  => $this->request->getPost('kode_dosen'),
					'nidn'        => $this->request->getPost('nidn'),
					'nama_dosen'  => $this->request->getPost('nama_dosen'),
					'password'    => $this->request->getPost('password'),
		 		);
		 			$this->ModelDosen->edit($data);
		 		}else{
		 			$dosen = $this->ModelDosen->detailData($id_dosen);
		 			if ($dosen['foto_dosen']!= "") {
		 				unlink('fotodosen/'. $dosen['foto_dosen']);
		 			}
		 			//merename foto
			 		$nama_file = $photo->getRandomName();
			 		$data = array(
			 			'id_dosen'    => $id_dosen,
			 			'kode_dosen'  => $this->request->getPost('kode_dosen'),
						'nidn'        => $this->request->getPost('nidn'),
						'nama_dosen'  => $this->request->getPost('nama_dosen'),
						'password'    => $this->request->getPost('password'),
						'foto_dosen'  => $nama_file, 
			 		);
			 		$photo->move('fotodosen', $nama_file);
					$this->ModelDosen->edit($data);
		 		}
				session()->setFlashData('pesan','Data Berhasil Di Ganti !!');
				return redirect()->to(base_url('dosen'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit/'. $id_dosen));
		 }
	}

	public function delete($id_dosen)
	{
		$dosen = $this->ModelDosen->detailData($id_dosen);
		if ($dosen['foto_dosen']!= "") {
			unlink('fotodosen/'. $dosen['foto_dosen']);
		}
	    $data = [
			'id_dosen' => $id_dosen,
		];
		$this->ModelDosen->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('dosen'));
	}
}
