<?php

namespace App\Controllers;
use App\Models\ModelDsn;
use App\Models\ModelTa;
use App\Models\ModelDosen;

class Ldosen extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelDsn = new ModelDsn();
		$this->ModelTa = new ModelTa();
		$this->ModelDosen = new ModelDosen();
	}

	public function index()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'   => 'Home',
			'dosen'   => $this->ModelDosen->Data(),
			'ta'      => $this->ModelDsn->jadwalDosen($ta['id_ta']),
			'isi'     => 'v_dashboard_dosen'
		];
		return view('layout/v_wrapper',$data);
	}

	public function edit($id_dosen)
	{
		if ($this->validate([
			'foto_dosen' => [
                'label' => 'Photo Dosen',
                'rules' => 'max_size[foto_dosen,1024]|mime_in[foto_dosen,image/jpg,image/gif,image/png,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib JPG/GIF/PNG/JPG/JPEG/ICO !!!'
                    ]
                ],
		])) {
			$photo = $this->request->getFile('foto_dosen');

			if ($photo->getError() == 4) {
		 			$data = array(
		 			'id_dosen'         => $id_dosen,
		 			'alamat'           => $this->request->getPost('alamat'),
					'no_hp'            => $this->request->getPost('no_hp'),
					'password'         => $this->request->getPost('password'),
		 		);
		 			$this->ModelDosen->edit($data);
		 		}else{
		 			$dosen = $this->ModelDosen->detailData($id_dosen);
		 			if ($dosen['foto_dosen']!= "") {
		 				unlink('fotodosen/'. $dosen['foto_dosen']);
		 			}
		 			//merename foto
			 		$nama_file = $photo->getRandomName();
			 		$data = array(
		 			'id_dosen'        => $id_dosen,
		 			'alamat'          => $this->request->getPost('alamat'),
					'no_hp'           => $this->request->getPost('no_hp'),
					'password'        => $this->request->getPost('password'),
					'foto_dosen'      => $nama_file, 
			 		);
			 		$photo->move('fotodosen', $nama_file);
					$this->ModelDosen->edit($data);
		 		}
		 		
				session()->setFlashData('pesan','Data Berhasil Di Update !!');
				return redirect()->to(base_url('dosen'));
		}else{
			session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/'. $id_dosen));
		}
	}

	public function jadwal()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Jadwal Mengajar',
			'ta'           => $ta,
			'jadwal'       => $this->ModelDsn->jadwalDosen($ta['id_ta']),
			'isi'          => 'dosen/v_jadwal'
		];
		return view('layout/v_wrapper',$data);
	}

	public function AbsenKelas()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Absensi Kelas',
			'ta'           => $ta,
			'absen'        => $this->ModelDsn->jadwalDosen($ta['id_ta']),
			'isi'          => 'dosen/absen/v_absen'
		];
		return view('layout/v_wrapper',$data);
	}

	public function absensi($id_jadwal)
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Absensi',
			'ta'           => $ta,
			'jadwal'       => $this->ModelDsn->detailJadwal($id_jadwal),
			'mhs'           => $this->ModelDsn->mhs($id_jadwal),
			'dosen'        => $this->ModelDsn->jadwalDosen($id_jadwal),
			'isi'          => 'dosen/absen/v_absensi'
		];
		return view('layout/v_wrapper',$data);
	}

	public function SimpanAbsen($id_jadwal)
	{
		$dosen          = $this->ModelDsn->dosen($id_jadwal);
		foreach ($dosen as $key => $value) {
			$data = [
				'id_krs' => $this->request->getPost($value['id_krs']. 'id_krs'),
				'p1'   => $this->request->getPost($value['id_krs']. 'p1'),	
				'p2'   => $this->request->getPost($value['id_krs']. 'p2'),
				'p3'   => $this->request->getPost($value['id_krs']. 'p3'),
				'p4'   => $this->request->getPost($value['id_krs']. 'p4'),
				'p5'   => $this->request->getPost($value['id_krs']. 'p5'),
				'p6'   => $this->request->getPost($value['id_krs']. 'p6'),
				'p7'   => $this->request->getPost($value['id_krs']. 'p7'),
				'puts' => $this->request->getPost($value['id_krs']. 'puts'),
				'p8'   => $this->request->getPost($value['id_krs']. 'p8'),
				'p9'   => $this->request->getPost($value['id_krs']. 'p9'),
				'p10'  => $this->request->getPost($value['id_krs']. 'p10'),
				'p11'  => $this->request->getPost($value['id_krs']. 'p11'),
				'p12'  => $this->request->getPost($value['id_krs']. 'p12'),
				'p13'  => $this->request->getPost($value['id_krs']. 'p13'),
				'p14'  => $this->request->getPost($value['id_krs']. 'p14'),
				'puas' => $this->request->getPost($value['id_krs']. 'puas'),
				
			];
			$this->ModelDsn->SimpanAbsen($data);
		}
			session()->setFlashData('pesan','Absensi Berhasil Di Update !!');
			return redirect()->to(base_url('ldosen/absensi/'. $id_jadwal));
	}

	public function print_absensi($id_jadwal)
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Absensi',
			'ta'		   => $ta,
			'jadwal'       => $this->ModelDsn->detailJadwal($id_jadwal),
			'mhs'           => $this->ModelDsn->mhs($id_jadwal),
			'dosen'          => $this->ModelDsn->jadwalDosen($id_jadwal),
		];
		return view('dosen/absen/v_print_absensi',$data);
	}

	public function NilaiMahasiswa()
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Nilai Mahasiswa',
			'ta'           => $ta,
			'absen'        => $this->ModelDsn->jadwalDosen($ta['id_ta']),
			'isi'          => 'dosen/nilai/v_nilai_mahasiswa'
		];
		return view('layout/v_wrapper',$data);
	}

	public function DataNilai($id_jadwal)
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Data Nilai Mahasiswa',
			'ta'           => $ta,
			'jadwal'       => $this->ModelDsn->detailJadwal($id_jadwal),
			'mhs'          => $this->ModelDsn->mhs($id_jadwal),
			'dosen'        => $this->ModelDsn->jadwalDosen($id_jadwal),
			'isi'          => 'dosen/nilai/v_datanilai'
		];
		return view('layout/v_wrapper',$data);
	}

	public function SimpanNilai($id_jadwal)
	{
		$dosen          = $this->ModelDsn->dosen($id_jadwal);
		foreach ($dosen as $key => $value) {
			$absen = $this->request->getPost($value['id_krs']. 'absen');
			$tugas =  $this->request->getPost($value['id_krs']. 'nilai_tugas');
			$uts =  $this->request->getPost($value['id_krs']. 'nilai_uts');
			$uas =  $this->request->getPost($value['id_krs']. 'nilai_uas');
			$na  = ($absen * 20/100)+($tugas * 20/100)+($uts * 25/100)+($uas * 35/100);
			if ($na >= 85) {
				$nh = 'A';
				$bobot = 4;
			}elseif ($na < 85 && $na >= 75) {
				$nh = 'B';
				$bobot = 3;
			}elseif ($na < 75 && $na >= 65) {
				$nh = 'C';
				$bobot = 2;
			}elseif ($na < 65 && $na >= 55) {
				$nh = 'D';
				$bobot = 1;
			}else{
				$nh = 'E';
				$bobot = 0;
			}
			$data = [
				'id_krs'      => $this->request->getPost($value['id_krs']. 'id_krs'),
				'nilai_tugas' => $this->request->getPost($value['id_krs']. 'nilai_tugas'),
				'nilai_uts'   => $this->request->getPost($value['id_krs']. 'nilai_uts'),
				'nilai_uas'   => $this->request->getPost($value['id_krs']. 'nilai_uas'),
				'nilai_akhir' => number_format($na, 0),
				'huruf'       => $nh,
				'bobot'       => $bobot,
			];
			$this->ModelDsn->SimpanNilai($data);
		}
			session()->setFlashData('pesan','Nilai Berhasil Di Update !!');
			return redirect()->to(base_url('ldosen/DataNilai/'. $id_jadwal));
	}

	public function PrintNilai($id_jadwal)
	{
		$ta = $this->ModelTa->ta_aktif();
		$data = [
			'title'        => 'Data Nilai Mahasiswa',
			'ta'           => $ta,
			'jadwal'       => $this->ModelDsn->detailJadwal($id_jadwal),
			'dosen'          => $this->ModelDsn->dosen($id_jadwal),
			
		];
		return view('dosen/nilai/v_printnilai',$data);
	}
}
