<?php

namespace App\Controllers;
use App\Models\ModelRuangan;
use App\Models\ModelGedung;

class Ruangan extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelRuangan = new ModelRuangan();
		$this->ModelGedung = new ModelGedung();
	}

	public function index()
	{
		$data = [
			'title'   => 'Ruangan',
			'ruangan' => $this->ModelRuangan->allData(),
			'isi'     => 'admin/ruangan/index'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'title'   => 'Add Ruangan',
			'gedung'  => $this->ModelGedung->allData(),
			'isi'     => 'admin/ruangan/v_add'
		];
		return view('layout/v_wrapper',$data);
	}

	public function insert()
	{
		 if ($this->validate([
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'ruangan' => [
                'label' => 'Ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            ])){
		 		$data = [
					'id_gedung' => $this->request->getPost('id_gedung'),
					'ruangan'   => $this->request->getPost('ruangan'),
				];
				$this->ModelRuangan->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('ruangan'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/add'));
		 }
	}

	public function edit($id_ruangan)
	{
		$data = [
			'title'   => 'Edit Ruangan',
			'gedung'  => $this->ModelGedung->allData(),
			'ruangan' => $this->ModelRuangan->detailData($id_ruangan),
			'isi'     => 'admin/ruangan/v_edit'
		];
		return view('layout/v_wrapper',$data);
	}

	public function update($id_ruangan)
	{
		 if ($this->validate([
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            ])){
		 		$data = [
		 			'id_ruangan'=> $id_ruangan,
					'id_gedung' => $this->request->getPost('id_gedung'),
					'ruangan'   => $this->request->getPost('ruangan'),
				];
				$this->ModelRuangan->edit($data);
				session()->setFlashData('pesan','Data Berhasil Di Update !!');
				return redirect()->to(base_url('ruangan'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ruangan/edit/'.$id_ruangan));
		 }
	}

	public function delete($id_ruangan)
	{
	    $data = [
			'id_ruangan' => $id_ruangan,
		];
		$this->ModelRuangan->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('ruangan'));
	}
}