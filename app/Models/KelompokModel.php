<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokModel extends Model
{
    protected $table            = 'kelompok';
    protected $primaryKey       = 'id_kelompok';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
}
