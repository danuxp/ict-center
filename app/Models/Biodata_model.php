<?php

namespace App\Models;

use CodeIgniter\Model;

class Biodata_model extends Model
{
    protected $table, $db;
    protected $allowedFields = [
        'nama_lengkap', 'nama_cantik', 'angkatan', 'tgl_lahir', 'alamat', 'no_wa', 'img'
    ];

    public function __construct()
    {
        // Memanggil class Database
        $this->db = db_connect();
        // Menginisialisasi $this->table untuk menampung data table product
        $this->table = $this->db->table('biodata');
    }

    public function getData($id = false)
    {
        if ($id === false) {
            $builder = $this->table;
            $builder->orderBy('angkatan', 'DESC');
            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $builder = $this->table;
            $query = $builder->getWhere(['id_biodata' => $id]);
            return $query;
        }
    }
}
