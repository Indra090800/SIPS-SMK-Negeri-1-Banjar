<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model
{
    public function jadwalDosen($id_ta)
    {
        return $this->db->table('tbl_jadwal')
		->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
        ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
        ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->where('tbl_dosen.nidn', session()->get('username'))
        ->where('tbl_jadwal.id_ta', $id_ta)
		->get()->getResultArray();
    }

    public function detailJadwal($id_jadwal)
    {
        return $this->db->table('tbl_jadwal')
        ->where('tbl_jadwal.id_jadwal', $id_jadwal)
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
        ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_prodi.id_jurusan', 'left')
        ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
        ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
		->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('tbl_krs')
        ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs', 'left')
        ->where('id_jadwal', $id_jadwal)
        ->get()->getResultArray();
    }

    public function SimpanAbsen($data)
    {
        $this->db->table('tbl_krs')
        ->where('id_krs', $data['id_krs'])
        ->update($data);
    }

    public function SimpanNilai($data)
    {
        $this->db->table('tbl_krs')
        ->where('id_krs', $data['id_krs'])
        ->update($data);
    }
}