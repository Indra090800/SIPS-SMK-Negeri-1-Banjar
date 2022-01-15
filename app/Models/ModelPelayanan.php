<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelayanan extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_pelayanan')
		->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_pelayanan.id_mhs', 'left')
		->orderBy('id_pelayanan','DESC')
		->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_pelayanan')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_pelayanan')
		->where('id_pelayanan', $data['id_pelayanan'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_pelayanan')
		->where('id_pelayanan', $data['id_pelayanan'])
		->delete($data);
	} 
}