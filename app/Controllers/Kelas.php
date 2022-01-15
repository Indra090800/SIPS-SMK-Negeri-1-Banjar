<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelKelas = new ModelKelas();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
	}

	public function index()
	{
		$data = [
			'title' => 'Rombongan Kelas',
			'kelas' => $this->ModelKelas->allData(),
			'dosen' => $this->ModelDosen->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'isi'   => 'admin/kelas/v_kelas'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		if ($this->validate([
            'nama_kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'id_prodi' => [
                'label' => 'Program Study',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'id_dosen' => [
                'label' => 'Dosen PA',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],    
            ])){
		 		$data = [
					'nama_kelas'      => $this->request->getPost('nama_kelas'),
					'id_prodi'        => $this->request->getPost('id_prodi'),
					'id_dosen'        => $this->request->getPost('id_dosen'),
					'tahun_angkatan'  => $this->request->getPost('tahun_angkatan'),
				];
				$this->ModelKelas->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('kelas'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
		 }
	}

	public function delete($id_kelas)
	{
	    $data = [
			'id_kelas' => $id_kelas,
		];
		$this->ModelKelas->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('kelas'));
	}

	public function rincian_kelas($id_kelas)
	{ 
	    $data = [
			'title' => 'Rombongan Kelas',
			'kelas' => $this->ModelKelas->detailData($id_kelas),
			'mhs'   => $this->ModelKelas->mahasiswa($id_kelas),
			'jml'   => $this->ModelKelas->jml_mhs($id_kelas),
			'mhs_tpk' => $this->ModelKelas->mhs_blm_kelas(),
			'isi'     => 'admin/kelas/v_rincian_kelas'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add_mhs($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs'   => $id_mhs,
			'id_kelas' => $id_kelas
		];
		$this->ModelKelas->update_mhs($data);
		session()->setFlashData('pesan','Mahasiswa Berhasil Di Tambahkan Ke Kelas !!');
		return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
	}

	public function remove_mhs($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs'   => $id_mhs,
			'id_kelas' => null
		];
		$this->ModelKelas->update_mhs($data);
		session()->setFlashData('pesan','Mahasiswa Berhasil Di Hapus Dari Kelas !!');
		return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
	}
}
