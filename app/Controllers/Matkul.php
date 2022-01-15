<?php

namespace App\Controllers;
use App\Models\ModelMatkul;
use App\Models\ModelProdi;

class Matkul extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelMatkul = new ModelMatkul();
		$this->ModelProdi = new ModelProdi();
	}

	public function index()
	{
		$data = [
			'title'   => 'Mata Pelajaran',
			'prodi' => $this->ModelProdi->allData(),
			'isi'     => 'admin/matkul/v_matkul'
		];
		return view('layout/v_wrapper',$data);
	}

	public function detail($id_prodi)
	{
		$data = [
			'title'   => 'Mata Pelajaran',
			'prodi' => $this->ModelProdi->detailData($id_prodi),
			'matkul' => $this->ModelMatkul->allDataMatkul($id_prodi),
			'isi'     => 'admin/matkul/v_detail'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add($id_prodi)
	{
		if ($this->validate([
            'kode_matkul' => [
            'label' => 'Kode Mata Pelajaran',
            'rules' => 'required|is_unique[tbl_matkul.kode_matkul]',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!',
                'is_unique' => '{field} Sudah Ada, Input Kode Lain !!!'
                	]
                ],
            'matkul' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajid Diisi !!!'
                    ]
                ],
            'smt' => [
            'label' => 'Semester',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajid Diisi !!!'
                ]
            ],
            ])){
			$smt = $this->request->getPost('smt');
			if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
				$semester = 'Ganjil';
			}else{
				$semester = 'Genap';
			}
			$data = [
					'kode_matkul'   => $this->request->getPost('kode_matkul'),
					'matkul'        => $this->request->getPost('matkul'),
					'sks'           => $this->request->getPost('sks'),
					'kategori'      => $this->request->getPost('kategori'),
					'semester'      => $semester,
					'smt'           => $this->request->getPost('smt'),
					'id_prodi'      => $id_prodi,
				];
				$this->ModelMatkul->add($data);
				session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
				return redirect()->to(base_url('matkul/detail/'. $id_prodi));
		}else{
			session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('matkul/detail/'. $id_prodi));
		}
	}

	public function delete($id_prodi, $id_matkul)
	{
	    $data = [
			'id_matkul' => $id_matkul,
		];
		$this->ModelMatkul->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('matkul/detail/'. $id_prodi));
	}
}