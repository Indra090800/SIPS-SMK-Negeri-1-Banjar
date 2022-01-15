<?php

namespace App\Controllers;
use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelJadwalPelajaran;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class JadwalPelajaran extends BaseController
{
    function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
		$this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
	}

	public function index()
	{
		$data = [
			'title'    => 'Jadwal Pelajaran',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi'    => $this->ModelProdi->allData(),
			'isi'      => 'mhs/jadwalpelajaran/v_index'
		];
		return view('layout/v_wrapper',$data);
	}

	public function detailJadwal($id_prodi)
	{
		$data = [
			'title'    => 'Jadwal Pelajaran',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi'    => $this->ModelProdi->detailData($id_prodi),
			'jadwal'   => $this->ModelJadwalPelajaran->allData($id_prodi),
			'matkul'   => $this->ModelJadwalPelajaran->matkul($id_prodi),
			'dosen'    => $this->ModelDosen->allData(),
			'ruangan'  => $this->ModelRuangan->allData(),
			'kelas'    => $this->ModelJadwalPelajaran->kelas($id_prodi),
			'isi'      => 'mhs/jadwalpelajaran/v_detail'
		];
		return view('layout/v_wrapper',$data);
	}

}
