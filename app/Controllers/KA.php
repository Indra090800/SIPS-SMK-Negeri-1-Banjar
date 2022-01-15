<?php

namespace App\Controllers;
use App\Models\ModelKA;

class KA extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelKA = new ModelKA();
	}

	public function index()
	{
		$data = [
			'title'   => 'Kalender Akademik',
			'agenda' => $this->ModelKA->allData(),
			'isi'     => 'admin/v_ka'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'waktu' => $this->request->getPost('waktu'),
			'agenda' => $this->request->getPost('agenda'),
		];
		$this->ModelKA->add($data);
		session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
		return redirect()->to(base_url('ka'));
	}

	public function edit($id_agenda)
	{
		$data = [
			'id_agenda' => $id_agenda,
			'waktu'     => $this->request->getPost('waktu'),
			'agenda'    => $this->request->getPost('agenda'),
		];
		$this->ModelKA->edit($data);
		session()->setFlashData('pesan','Data Berhasil Di Update !!');
		return redirect()->to(base_url('ka'));
	}

	public function delete($id_agenda)
	{
	    $data = [
			'id_agenda' => $id_agenda,
		];
		$this->ModelKA->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('ka'));
	}
}
