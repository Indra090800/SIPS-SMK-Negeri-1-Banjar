<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_jurusan')
		->orderBy('id_jurusan','DESC')
		->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_jurusan')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_jurusan')
		->where('id_jurusan', $data['id_jurusan'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_jurusan')
		->where('id_jurusan', $data['id_jurusan'])
		->delete($data);
	} 
}