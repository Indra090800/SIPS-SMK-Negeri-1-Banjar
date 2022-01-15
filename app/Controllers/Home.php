<?php

namespace App\Controllers;
use App\Models\ModelDosen;
use App\Models\ModelTa;
use App\Models\ModelDsn;

class Home extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelDosen = new ModelDosen();
		$this->ModelTa = new ModelTa();
		$this->ModelDsn = new ModelDsn();
	}

	public function index()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'   => 'Home',
			'dosen'   => $this->ModelDosen->allData(),
			'jadwal'  => $this->ModelDsn->jadwalDosen($ta['id_ta']),
			'isi'     => 'v_home'
		];
		return view('layout/v_wrapper',$data);
	}
}
