<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false; 
    protected $allowedFields    = ['nip','nama','jenis_kelamin','tempat_lahir','tgl_lahir','telpon','agama','status_nikah','alamat'];

}
