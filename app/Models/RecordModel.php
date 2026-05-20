<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table = 'daily_records'; // tablo adı
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'record_date',
        'burned_calories',
        'steps'
    ];

    protected $useTimestamps = false;
}


