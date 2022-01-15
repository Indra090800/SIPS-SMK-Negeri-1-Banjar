<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKA extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_agenda')
		->orderBy('id_agenda','DESC')
		->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_agenda')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_agenda')
		->where('id_agenda', $data['id_agenda'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_agenda')
		->where('id_agenda', $data['id_agenda'])
		->delete($data);
	} 
}