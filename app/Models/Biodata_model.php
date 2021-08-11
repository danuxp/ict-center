<?php

namespace App\Models;

use CodeIgniter\Model;

class Biodata_model extends Model
{
    protected $table;
    protected $allowedFields = [
        'nama_lengkap', 'nama_cantik', 'angkatan', 'tgl_lahir', 'alamat', 'no_wa', 'img'
    ];

    public function __construct()
    {

        parent::__construct();
        // Memanggil class Database
        $db = \Config\Database::connect();
        // Menginisialisasi $this->table untuk menampung data table product
        $this->table = $this->db->table('biodata');
    }

    public function getData()
    {
        $builder = $this->table;
        $builder->select('*');
        $builder->orderBy('angkatan', 'DESC');
        $query = $builder->get();

        return $query->getResult();
    }

    public function getDataId($id)
    {
        // if ($id === false) {
        //     return $this->findAll();
        // } else {
        //     return $this->getWhere(['id_biodata' => $id]);
        // }
        return $this->table->where('id_biodata', $id)->get()->getRowArray();
    }
}
