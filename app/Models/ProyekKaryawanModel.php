<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekKaryawanModel extends Model
{
    protected $table = 'proyek_karyawan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false; 
    protected $allowedFields    = ['id_proyek','id_karyawan'];

}
