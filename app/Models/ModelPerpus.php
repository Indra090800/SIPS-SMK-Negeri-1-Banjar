<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPerpus extends Model
{
	public function allData($id_mhs)
	{
		return $this->db->table('tbl_perpus')
		->join('tbl_mhs', 'tbl_mhs.id_anggota = tbl_perpus.id_anggota', 'left')
		->join('tbl_buku', 'tbl_buku.id_buku = tbl_perpus.id_buku', 'left')
		->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_perpus.id_petugas', 'left')
		->where('id_mhs', $id_mhs)
		->get()->getResultArray();
	}

	public function Data()
	{
		return $this->db->table('tbl_perpus')
		->join('tbl_mhs', 'tbl_mhs.id_anggota = tbl_perpus.id_anggota', 'left')
		->get()->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_perpus')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_perpus')
		->where('id_perpus', $data['id_perpus'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_perpus')
		->where('id_perpus', $data['id_perpus'])
		->delete($data);
	} 
}