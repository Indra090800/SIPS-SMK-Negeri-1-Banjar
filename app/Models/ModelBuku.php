<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbuku extends Model
{
	public function allData()
	{
		return $this->db->table('tbl_buku')
		->orderBy('id_buku','DESC')
		->get()->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tbl_buku')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tbl_buku')
		->where('id_buku', $data['id_buku'])
		->update($data);
	}

	public function delete_data($data)
	{
	    $this->db->table('tbl_buku')
		->where('id_buku', $data['id_buku'])
		->delete($data);
	} 
}