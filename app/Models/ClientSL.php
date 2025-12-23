<?php

namespace App\Models;

use App\Enums\ClientSLStatusEnum;
use Illuminate\Database\Eloquent\Model;

class ClientSL extends Model
{
    protected $table = 'client_sl';
    protected $fillable = [
        'rno',
        'proposal',
        'dated',
        'time',
        'status',
        'remarks',
        'slby',
        'doneby',
        'donedate',
    ];

    protected function casts()
    {
        return [
            'status' => ClientSLStatusEnum::class,
        ];
    }

    // public function bio()
    // {
    //     return $this->belongsTo(ProfileBio::class, 'proposal', 'rno');
    // }
    public function vp()
    {
        return $this->belongsTo(ViewProfile::class, 'proposal', 'rno');
    }

    public function client()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }

    public function sendMail()
    {
        return $this->belongsTo(Sendmail::class, 'proposal', 'rno');
    }

    public function receiveMail()
    {
        return $this->belongsTo(Sendmail::class, 'rno', 'proposal');
    }
}
