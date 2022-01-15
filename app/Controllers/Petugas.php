<?php

namespace App\Controllers;
use App\Models\ModelPetugas;

class petugas extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelPetugas = new ModelPetugas();
	}

	public function index()
	{
		$data = [
			'title'   => 'Petugas Perpustakaan',
			'petugas' => $this->ModelPetugas->allData(),
			'isi'     => 'admin/v_petugas'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'nama_petugas' => $this->request->getPost('nama_petugas'),
			'tugas'        => $this->request->getPost('tugas'),
		];
		$this->ModelPetugas->add($data);
		session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
		return redirect()->to(base_url('petugas'));
	}

	public function edit($id_petugas)
	{
		$data = [
			'id_petugas' => $id_petugas,
			'nama_petugas' => $this->request->getPost('nama_petugas'),
			'tugas'        => $this->request->getPost('tugas'),
		];
		$this->ModelPetugas->edit($data);
		session()->setFlashData('pesan','Data Berhasil Di Update !!');
		return redirect()->to(base_url('petugas'));
	}

	public function delete($id_petugas)
	{
	    $data = [
			'id_petugas' => $id_petugas,
		];
		$this->ModelPetugas->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('petugas'));
	}
}
