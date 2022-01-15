<?php

namespace App\Controllers;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelJurusan = new ModelJurusan();
	}

	public function index()
	{
		$data = [
			'title'   => 'Fakultas',
			'jurusan' => $this->ModelJurusan->allData(),
			'isi'     => 'admin/v_jurusan'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'jurusan' => $this->request->getPost('jurusan'),
		];
		$this->ModelJurusan->add($data);
		session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
		return redirect()->to(base_url('jurusan'));
	}

	public function edit($id_jurusan)
	{
		$data = [
			'id_jurusan' => $id_jurusan,
			'jurusan'    => $this->request->getPost('jurusan'),
		];
		$this->ModelJurusan->edit($data);
		session()->setFlashData('pesan','Data Berhasil Di Update !!');
		return redirect()->to(base_url('jurusan'));
	}

	public function delete($id_jurusan)
	{
	    $data = [
			'id_jurusan' => $id_jurusan,
		];
		$this->ModelJurusan->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('jurusan'));
	}
}
