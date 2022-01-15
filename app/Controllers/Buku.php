<?php

namespace App\Controllers;
use App\Models\ModelBuku;

class buku extends BaseController
{
	function __construct()
	{
		helper('form');
		$this->ModelBuku = new ModelBuku();
	}

	public function index()
	{
		$data = [
			'title'   => 'Buku',
			'buku' => $this->ModelBuku->allData(),
			'isi'     => 'admin/v_buku'
		];
		return view('layout/v_wrapper',$data);
	}

	public function add()
	{
		$data = [
			'judul_buku'    => $this->request->getPost('judul_buku'),
			'pengarang'     => $this->request->getPost('pengarang'),
			'edisi'         => $this->request->getPost('edisi'),
			'isbn'          => $this->request->getPost('isbn'),
			'kolasi'        => $this->request->getPost('kolasi'),
			'penerbit'      => $this->request->getPost('penerbit'),
			'tahun_terbit'  => $this->request->getPost('tahun_terbit'),
			'tempat_terbit' => $this->request->getPost('tempat_terbit'),
			'stok'          => $this->request->getPost('stok'),
			'sumber'        => $this->request->getPost('sumber'),

		];
		$this->ModelBuku->add($data);
		session()->setFlashData('pesan','Data Berhasil Di Tambahkan !!');
		return redirect()->to(base_url('buku'));
	}

	public function edit($id_buku)
	{
		$data = [
			'id_buku'       => $id_buku,
			'judul_buku'    => $this->request->getPost('judul_buku'),
			'pengarang'     => $this->request->getPost('pengarang'),
			'edisi'         => $this->request->getPost('edisi'),
			'isbn'          => $this->request->getPost('isbn'),
			'kolasi'        => $this->request->getPost('kolasi'),
			'penerbit'      => $this->request->getPost('penerbit'),
			'tahun_terbit'  => $this->request->getPost('tahun_terbit'),
			'tempat_terbit' => $this->request->getPost('tempat_terbit'),
			'stok'          => $this->request->getPost('stok'),
			'sumber'        => $this->request->getPost('sumber'),
		];
		$this->ModelBuku->edit($data);
		session()->setFlashData('pesan','Data Berhasil Di Update !!');
		return redirect()->to(base_url('buku'));
	}

	public function delete($id_buku)
	{
	    $data = [
			'id_buku' => $id_buku,
		];
		$this->ModelBuku->delete_data($data);
		session()->setFlashData('pesan','Data Berhasil Di Hapus !!');
		return redirect()->to(base_url('buku'));
	}
}
