<?php

namespace App\Models;

use CodeIgniter\Model;

class BusModel extends Model
{
    protected $table            = 'bus';
    protected $primaryKey       = 'id_bus';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
}
