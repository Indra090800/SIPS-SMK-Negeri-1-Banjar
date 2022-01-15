<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelJurusan;
use App\Models\ModelDosen;

class Prodi extends BaseController
{

	function __construct()
	{	
		helper('form');
		$this->ModelProdi = new ModelProdi();
		$this->ModelDosen = new ModelDosen();
		$this->ModelJurusan = new ModelJurusan();
	}

	public function index()
	{
		$data = [
			'title' => 'Program Study',
			'prodi' => $this->ModelProdi->allData(),
			'isi' => 'admin/prodi/v_index'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'title' => 'Program Study',
			'jurusan' => $this->ModelJurusan->allData(),
			'dosen'   => $this->ModelDosen->allData(),
			'isi' => 'admin/prodi/v_add'
		];
		return view('layout/v_wrapper',$data);
	}

	public function insert()
	{
		 if ($this->validate([
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'kode_prodi' => [
            'label' => 'Kode Prodi',
            'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'prodi' => [
                'label' => 'Program Study',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
			'ka_prodi' => [
				'label' => 'KA Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajid Diisi !!!'
					]
				],
            ])){
		 		$data = [
					'id_jurusan'   => $this->request->getPost('id_jurusan'),
					'kode_prodi'   => $this->request->getPost('kode_prodi'),
					'prodi'        => $this->request->getPost('prodi'),
					'jenjang'      => $this->request->getPost('jenjang'),
					'ka_prodi'     => $this->request->getPost('ka_prodi'),
				];
				$this->ModelProdi->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('prodi'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/add'));
		 }
	}

	public function edit($id_prodi)
	{
		$data = [
			'title'   => 'Edit Program Study',
			'jurusan' => $this->ModelJurusan->allData(),
			'prodi'   => $this->ModelProdi->detailData($id_prodi),
			'dosen'   => $this->ModelDosen->allData(),
			'isi'     => 'admin/prodi/v_edit'
		];
		return view('layout/v_wrapper',$data);
	}

	public function update($id_prodi)
	{
		if ($this->validate([
            'id_jurusan' => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'prodi' => [
                'label' => 'Program Study',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
			'ka_prodi' => [
				'label' => 'KA Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajid Diisi !!!'
					]
				],
            ])){
				$data = [
		 			'id_prodi'     => $id_prodi,
					'id_jurusan'   => $this->request->getPost('id_jurusan'),
					'kode_prodi'   => $this->request->getPost('kode_prodi'),
					'prodi'        => $this->request->getPost('prodi'),
					'jenjang'      => $this->request->getPost('jenjang'),
					'ka_prodi'     => $this->request->getPost('ka_prodi'),
				];
				$this->ModelProdi->edit($data);
				session()->setFlashData('pesan','Data Berhasil Di Update !!');
				return redirect()->to(base_url('prodi'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/'.$id_prodi));
		 }
	}

	public function delete($id_prodi)
	{
	    $data = [
			'id_prodi' => $id_prodi,
		];
		$this->ModelProdi->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('prodi'));
	}
}