<?php

namespace App\Controllers;
use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class JadwalKuliah extends BaseController
{
    function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
        $this->ModelProdi = new ModelProdi();
		$this->ModelJadwalKuliah = new ModelJadwalKuliah();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
	}

	public function index()
	{
		$data = [
			'title'    => 'Jadwal Kuliah',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi'    => $this->ModelProdi->allData(),
			'isi'      => 'admin/jadwalkuliah/v_index'
		];
		return view('layout/v_wrapper',$data);
	}

	public function detailJadwal($id_prodi)
	{
		$data = [
			'title'    => 'Jadwal Kuliah',
            'ta_aktif' => $this->ModelTa->ta_aktif(),
            'prodi'    => $this->ModelProdi->detailData($id_prodi),
			'jadwal'   => $this->ModelJadwalKuliah->allData($id_prodi),
			'matkul'   => $this->ModelJadwalKuliah->matkul($id_prodi),
			'dosen'    => $this->ModelDosen->allData(),
			'ruangan'  => $this->ModelRuangan->allData(),
			'kelas'    => $this->ModelJadwalKuliah->kelas($id_prodi),
			'isi'      => 'admin/jadwalkuliah/v_detail'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add($id_prodi)
	{
		if ($this->validate([
            'id_matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Dipilih !!!'
                    ]
                ],
            'id_dosen' => [
                'label' => 'Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Dipilih !!!'
                    ]
                ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Dipilih !!!'
                    ]
                ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],   
			'waktu' => [
				'label' => 'Waktu',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajid Diisi !!!'
					]
				],  
			'id_ruangan' => [
				'label' => 'Ruangan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajid Dipilih !!!'
					]
				], 
			'quota' => [
				'label' => 'Quota',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajid Diisi !!!'
					]
				],   
            ])){
				$ta = $this->ModelTa->ta_aktif();
				$data = [
					'id_prodi'       => $id_prodi,
					'id_ta'          => $ta['id_ta'],
					'id_matkul'      => $this->request->getPost('id_matkul'),
					'id_kelas'       => $this->request->getPost('id_kelas'),
					'id_dosen'       => $this->request->getPost('id_dosen'),
					'hari'           => $this->request->getPost('hari'),
					'waktu'          => $this->request->getPost('waktu'),
					'id_ruangan'     => $this->request->getPost('id_ruangan'),
					'quota'          => $this->request->getPost('quota'),
				];
				$this->ModelJadwalKuliah->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('jadwalkuliah/detailJadwal/'. $id_prodi));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
			 return redirect()->to(base_url('jadwalkuliah/detailJadwal/'. $id_prodi));
		 }	
	}

	public function delete($id_jadwal,$id_prodi)
	{
	    $data = [
			'id_jadwal' => $id_jadwal,
		];
		$this->ModelJadwalKuliah->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('jadwalkuliah/detailJadwal/'. $id_prodi));
	}
}
