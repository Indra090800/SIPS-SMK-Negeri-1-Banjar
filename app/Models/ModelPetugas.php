<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPetugas extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_petugas')
		->orderBy('id_petugas','DESC')
		->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_petugas')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_petugas')
		->where('id_petugas', $data['id_petugas'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_petugas')
		->where('id_petugas', $data['id_petugas'])
		->delete($data);
	} 
}