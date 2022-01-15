<?php

namespace App\Controllers;
use App\Models\ModelPelayanan;

class pelayanan extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelPelayanan = new ModelPelayanan();
	}

	public function index()
	{
		$data = [
			'title'     => 'Pelayanan',
			'pelayanan' => $this->ModelPelayanan->allData(),
			'isi'       => 'admin/pelayanan/v_pelayanan'
		];
		return view('layout/v_wrapper',$data);
	}

	public function delete($id_jurusan)
	{
	    $data = [
			'id_pelayanan' => $id_jurusan,
		];
		$this->ModelPelayanan->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('pelayanan'));
	}
}
