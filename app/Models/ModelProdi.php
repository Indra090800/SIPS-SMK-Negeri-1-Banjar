<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_prodi')
		->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_prodi.id_jurusan', 'left')
		->orderBy('tbl_prodi.prodi', 'ASC')
		->get()->getResultArray();
	}

	public function detailData($id_prodi)
	{
		return $this->db->table('tbl_prodi')
		->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_prodi.id_jurusan', 'left')
		->where('id_prodi', $id_prodi)
		->get()->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_prodi')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_prodi')
		->where('id_prodi', $data['id_prodi'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_prodi')
		->where('id_prodi', $data['id_prodi'])
		->delete($data);
	} 
}