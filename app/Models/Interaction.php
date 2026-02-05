<?php

namespace App\Models;

use App\Enums\InteractionCallTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $table = 'interaction';

    protected $fillable = [
        'rno',
        'dated',
        'time',
        'empid',
        'calltype',
        'callstatus',
        'description',
        'futuredate',
        'status',
        'created_at',
        'updated_at'
    ];

    protected function casts()
    {
        return [
            'calltype' => InteractionCallTypeEnum::class,
        ];
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'empid', 'username');
    }

    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
