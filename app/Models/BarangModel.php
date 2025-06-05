<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false; 
    protected $allowedFields    = ['nama','ket','jumlah','status'];

}
