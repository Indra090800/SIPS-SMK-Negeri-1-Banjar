<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_dosen')
		->orderBy('id_dosen','DESC')
		->get()->getResultArray();
	}
	public function Data()
	{
		return $this->db->table('tbl_dosen')
		->where('nidn', session()->get('username'))
		->join('tbl_kelas', 'tbl_kelas.id_dosen = tbl_dosen.id_dosen', 'left')
		->get()->getRowArray();
	}

	public function detailData($id_dosen)
	{
		return $this->db->table('tbl_dosen')
		->where('id_dosen', $id_dosen)
		->get()->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_dosen')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_dosen')
		->where('id_dosen', $data['id_dosen'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_dosen')
		->where('id_dosen', $data['id_dosen'])
		->delete($data);
	} 
}