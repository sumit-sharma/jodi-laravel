<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileMatch extends Model
{
    protected $fillable = [
        'rno',
        'agefrom',
        'ageupto',
        'hghtfrom',
        'hghtto',
        'religion',
        'caste',
        'education',
        'edupref',
        'eatingpref',
        'astropref',
        'rspref',
        'mspref',
        'childpref',
        'occupref',
        'incomepref',
        'zonepref',
        'mr',
    ];

    // Default values when no record exists
    protected $attributes = [
        'agefrom'     => '',
        'ageupto'     => '',
        'hghtfrom'    => '',
        'hghtto'      => '',
        'religion'    => '',
        'caste'       => '',
        'education'   => '',
        'edupref'     => '',
        'eatingpref'  => '',
        'astropref'   => '',
        'rspref'      => '',
        'mspref'      => '',
        'childpref'   => '',
        'occupref'    => '',
        'incomepref'  => '',
        'zonepref'    => '',
        'mr'          => '',
    ];



    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }
}
