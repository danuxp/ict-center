<?php

namespace App\Models;

use CodeIgniter\Model;

class Biodata_model extends Model
{
    protected $table = 'biodata';
    protected $allowedFields = [
        'nama_lengkap', 'nama_cantik', 'angkatan', 'tgl_lahir', 'alamat', 'no_wa', 'img'
    ];

    // public function __construct()
    // {
    //     // Memanggil class Database
    //     $this->db = db_connect();
    //     // Menginisialisasi $this->table untuk menampung data table product
    //     // $this->table = $this->db->table('biodata');
    // }

    public function getData($id = false)
    {
        if ($id === false) {
            $builder = $this->db->table($this->table);
            $builder->orderBy('angkatan', 'DESC');
            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $builder = $this->db->table($this->table);
            $query = $builder->getWhere(['id_biodata' => $id]);
            return $query;
        }
    }

    public function updateData($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_biodata', $id);
        return $builder->update($data);
    }

    public function hapusData($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_biodata' => $id]);
    }
}
