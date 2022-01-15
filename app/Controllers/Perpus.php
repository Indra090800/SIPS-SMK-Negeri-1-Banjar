<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelMahasiswa;
use App\Models\ModelPetugas;
use App\Models\ModelKrs;
use App\Models\ModelPerpus;


class Perpus extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelBuku = new ModelBuku();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelPetugas = new ModelPetugas();
		$this->ModelPerpus = new ModelPerpus();
		$this->ModelKrs = new ModelKrs();
	}

	public function index()
	{	
		$mhs   = $this->ModelKrs->DataMahasiswa();

		$data = [
			'title'    => 'Perpustakaan Buku SMK NEGERI 1 BANJAR',
			'buku'     => $this->ModelBuku->allData(),
			'petugas'  => $this->ModelPetugas->allData(),
			'perpus'   => $this->ModelPerpus->allData($mhs['id_mhs']),
			'mhs'      => $this->ModelMahasiswa->allData(),
			'siswa'    => $this->ModelMahasiswa->DataSiswa(),
			'isi'      => 'perpus/v_detail'
		];
		return view('layout/v_wrapper',$data);
	}

	public function pinjam()
	{	
		$data = [
			'title'    => 'Perpustakaan Buku SMK NEGERI 1 BANJAR',
			'buku'     => $this->ModelBuku->allData(),
			'petugas'  => $this->ModelPetugas->allData(),
			'mhs'      => $this->ModelMahasiswa->DataMahasiswa(),
			'siswa'    => $this->ModelMahasiswa->DataSiswa(),
			'isi'      => 'v_perpus'
		];
		return view('layout/v_wrapper',$data);
	}

	public function insert()
	{
		if ($this->validate([
            'id_anggota' => [
                'label' => 'Nama Anda',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!',
                    ]
                ],
            'id_buku' => [
            'label' => 'Buku',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!'
                	]
                ],
            'waktu' => [
            'label' => 'Tanggal Pinjam',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!'
                	]
                ],
            'id_petugas' => [
                'label' => 'Nama Petugas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            ])){

				$tgl_kembali = date('Y-m-d', strtotime("30 day", strtotime(date("Y-m-d"))));
		 		$data = array(
		 			'id_anggota'  => $this->request->getPost('id_anggota'),
					'id_buku'  	  => $this->request->getPost('id_buku'),
					'waktu'   	  => $this->request->getPost('waktu'),
					'kembali'     => $tgl_kembali,
					'id_petugas'  => $this->request->getPost('id_petugas'),
		 		);

				$this->ModelPerpus->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('perpus'));
		 }else{
		 	session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('perpus'));
		 }
	}

	public function tambah_waktu($id_perpus)
	{
		$tgl_kembali = date('Y-m-d', strtotime("30 day", strtotime(date("Y-m-d"))));
		$data = [
			'id_perpus'   => $id_perpus,
			'kembali'     => $tgl_kembali,
		];
		$this->ModelPerpus->edit($data);
		session()->setFlashData('pesan','Waktu Berhasil Di Update !!');
		return redirect()->to(base_url('perpus'));
	}

	public function kembalikan($id_perpus)
	{
		$status = "Sudah dikembalikan";
		$data = [
			'id_perpus'   => $id_perpus,
			'status'   	  => $status
		];
		$this->ModelPerpus->edit($data);
		session()->setFlashData('pesan','Waktu Berhasil Di Update !!');
		return redirect()->to(base_url('perpus'));
	}
}
