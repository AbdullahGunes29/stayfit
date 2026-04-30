<?php

namespace App\Models;

use CodeIgniter\Model;

class DailyRecordModel extends Model{

    protected $table = 'daily_records';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'record_date',
        'burned-calories',
        'steps'
    ];
}

