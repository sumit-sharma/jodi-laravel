<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgLog extends Model
{
    protected $table = 'org_log';

    protected $fillable = [
        'rno',
        'orgname',
        'orgdept',
        'orgyear',
        'dated',
        'time',
        'empid',
    ];
}
