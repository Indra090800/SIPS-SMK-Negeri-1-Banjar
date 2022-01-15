<?php

namespace App\Controllers;
use App\Models\ModelAdmin;
use App\Models\ModelTa;
use App\Models\ModelKrs;
use App\Models\ModelMahasiswa;
use App\Models\ModelPelayanan;

class Mhs extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelTa = new ModelTa();
		$this->ModelKrs = new ModelKrs();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelPelayanan = new ModelPelayanan();
	}

	public function index()
	{
		$data = [
			'title'        => 'Dashboard',
			'mhs'          => $this->ModelMahasiswa->DataMahasiswa(),
			'ta'           => $this->ModelTa->ta_aktif(),
			'isi'          => 'v_dashboard_mhs'
		];
		return view('layout/v_wrapper',$data);
	}

	public function kirim_pesan()
	{
		$data = [
			'nama'    => $this->request->getPost('nama'),
			'email'   => $this->request->getPost('email'),
			'subject' => $this->request->getPost('subject'),
			'isi'     => $this->request->getPost('isi'),
		];
		$this->ModelPelayanan->add($data);
		session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
		return redirect()->to(base_url('mhs'));
	}

	public function edit($id_mhs)
	{
		if ($this->validate([
			'foto_mhs' => [
                'label' => 'Photo Mahasiswa',
                'rules' => 'max_size[foto_mhs,1024]|mime_in[foto_mhs,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
		])) {
			$photo = $this->request->getFile('foto_mhs');

			if ($photo->getError() == 4) {
		 			$data = array(
		 			'id_mhs'        => $id_mhs,
		 			'alamat_siswa'  => $this->request->getPost('alamat_siswa'),
		 			'id_anggota'    => $this->request->getPost('id_anggota'),
					'no_hp_siswa'   => $this->request->getPost('no_hp_siswa'),
					'password'      => $this->request->getPost('password'),
		 		);
		 			$this->ModelMahasiswa->edit($data);
		 		}else{
		 			$mhs = $this->ModelMahasiswa->detailData($id_mhs);
		 			if ($mhs['foto_mhs']!= "") {
		 				unlink('fotomhs/'. $mhs['foto_mhs']);
		 			}
		 			//merename foto
			 		$nama_file = $photo->getRandomName();
			 		$data = array(
		 			'id_mhs'        => $id_mhs,
		 			'alamat_siswa'  => $this->request->getPost('alamat_siswa'),
		 			'id_anggota'    => $this->request->getPost('id_anggota'),
					'no_hp_siswa'   => $this->request->getPost('no_hp_siswa'),
					'password'      => $this->request->getPost('password'),
					'foto_mhs'      => $nama_file, 
			 		);
			 		$photo->move('fotomhs', $nama_file);
					$this->ModelMahasiswa->edit($data);
		 		}
		 		
				session()->setFlashData('pesan','Data Berhasil Di Update !!');
				return redirect()->to(base_url('mhs'));
		}else{
			session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/'. $id_mhs));
		}
	}

	public function absen()
	{
		$mhs = $this->ModelKrs->DataMahasiswa();
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'         => 'Absensi',
			'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMahasiswa(),
			'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'           => 'mhs/v_absensi'
		];
		return view('layout/v_wrapper',$data);
	}

	public function khs()
	{
		$mhs   = $this->ModelKrs->DataMahasiswa();
		$ta    = $this->ModelTa->ta_aktif();

		$data = [
			'title'         => 'Kartu Hasil Study (KHS)',
            'ta_aktif'      => $this->ModelTa->ta_aktif(),
            'mhs'           => $this->ModelKrs->DataMahasiswa(),
			'matkul_ditawar'=> $this->ModelKrs->Matkul_Ditawarkan($ta['id_ta'], $mhs['id_prodi']),
			'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_ta']),
			'isi'           => 'mhs/v_khs'
		];
		return view('layout/v_wrapper',$data);
	}
}
