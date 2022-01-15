<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_mhs')
		->join('tbl_prodi','tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
		->orderBy('id_mhs','DESC')
		->get()->getResultArray();
	}

	public function DataMahasiswa()
	{
		return $this->db->table('tbl_mhs')
		->where('nim', session()->get('username'))
		->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mhs.id_kelas', 'left')
		->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
		->join('tbl_prodi','tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
		->get()->getRowArray();
	}

	public function DataSiswa()
	{
		return $this->db->table('tbl_mhs')
		->where('id_anggota', session()->get('username'))
		->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mhs.id_kelas', 'left')
		->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
		->join('tbl_prodi','tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
		->get()->getRowArray();
	}

	public function detailData($id_mhs)
	{
		return $this->db->table('tbl_mhs')
		->where('id_mhs', $id_mhs)
		->join('tbl_prodi','tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
		->get()->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_mhs')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_mhs')
		->where('id_mhs', $data['id_mhs'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_mhs')
		->where('id_mhs', $data['id_mhs'])
		->delete($data);
	} 
}