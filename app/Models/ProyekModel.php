<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false; 
    protected $allowedFields    = ['judul','instansi','nama','kontak','alamat','kota','provinsi',
    'desc','start','end','biaya','status','file'];

}
