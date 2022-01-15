<?php

namespace App\Controllers;
use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;


class Mahasiswa extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelProdi = new ModelProdi();
	}

	public function index()
	{
		$data = [
			'title' => 'Siswa',
			'mhs' => $this->ModelMahasiswa->allData(),
			'isi' => 'admin/mhs/v_mhs'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{	
		$data = [
			'title' => 'Add Siswa',
			'prodi' => $this->ModelProdi->allData(),
			'isi'   => 'admin/mhs/v_add'
		];
		return view('layout/v_wrapper',$data);
	}

	public function delete($id_mhs)
	{
		$mhs = $this->ModelMahasiswa->detailData($id_mhs);
		if ($mhs['foto_mhs']!= "") {
			unlink('fotomhs/'. $mhs['foto_mhs']);
		}
	    $data = [
			'id_mhs' => $id_mhs,
		];
		$this->ModelMahasiswa->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('mahasiswa'));
	}

	public function insert()
	{
		if ($this->validate([
            'nim' => [
                'label' => 'NIS',
                'rules' => 'required|is_unique[tbl_mhs.nim]',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!',
                    'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                    ]
                ],
            'nama_mhs' => [
            'label' => 'Nama Mahasiswa',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'id_prodi' => [
            'label' => 'Program Study',
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
            'foto_mhs' => [
                'label' => 'Photo mhs',
                'rules' => 'uploaded[foto_mhs]|max_size[foto_mhs,1024]|mime_in[foto_mhs,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajid Diisi !!!',
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('foto_mhs');
		 	//merename foto
		 		$nama_file = $photo->getRandomName();
		 		$data = array(
		 			'nim'           => $this->request->getPost('nim'),
					'nama_mhs'  	=> $this->request->getPost('nama_mhs'),
					'id_prodi'   	=> $this->request->getPost('id_prodi'),
					'password'      => $this->request->getPost('password'),
					'foto_mhs'      => $nama_file, 
		 		);
		 		$photo->move('fotomhs', $nama_file);

				$this->ModelMahasiswa->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('mahasiswa'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/add'));
		 }
	}

	public function edit($id_mhs)
	{
		$data = [
			'title' => 'Edit Siswa',
			'mhs'   => $this->ModelMahasiswa->detailData($id_mhs),
			'prodi' => $this->ModelProdi->allData(),
			'isi'   => 'admin/mhs/v_edit'
		];
		return view('layout/v_wrapper',$data);
	}

	public function update($id_mhs)
	{
		if ($this->validate([
            'nim' => [
                'label' => 'NIS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'nama_mhs' => [
            'label' => 'Nama Mahasiswa',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'id_prodi' => [
            'label' => 'Program Study',
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
            'foto_mhs' => [
                'label' => 'Photo Mahasiswa',
                'rules' => 'max_size[foto_mhs,1024]|mime_in[foto_mhs,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
            ])){
		 	//mengambil foto inputan
		 		$photo = $this->request->getFile('foto_mhs');

		 		if ($photo->getError() == 4) {
		 			$data = array(
		 			'id_mhs'        => $id_mhs,
		 			'nim'           => $this->request->getPost('nim'),
					'nama_mhs'  	=> $this->request->getPost('nama_mhs'),
					'id_prodi'   	=> $this->request->getPost('id_prodi'),
					'password'      => $this->request->getPost('password'),
					
		 		);
		 			$this->ModelMahasiswa->edit($data);
		 		}else{
		 			$mhs = $this->ModelMahasiswa->detailData($id_mhs);
		 			if ($mhs['foto_mhs']!= "") {
		 				unlink('fotomhs/'. $mhs['foto_mhs']);
		 			}
		 			//merename foto
			 		$nama_file = $photo->getRandomName();
			 		$data = array(
		 			'id_mhs'        => $id_mhs,
		 			'nim'           => $this->request->getPost('nim'),
					'nama_mhs'  	=> $this->request->getPost('nama_mhs'),
					'id_prodi'   	=> $this->request->getPost('id_prodi'),
					'password'      => $this->request->getPost('password'),
					'foto_mhs'      => $nama_file, 
			 		);
			 		$photo->move('fotomhs', $nama_file);
					$this->ModelMahasiswa->edit($data);
		 		}
				session()->setFlashData('pesan','Data Berhasil Di Ganti !!');
				return redirect()->to(base_url('mahasiswa'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/'. $id_mhs));
		 }
	}
}
