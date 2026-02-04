<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoneList extends Model
{
    protected $table = 'done_lists';
    protected $fillable = [
        'br_rno',
        'br_name',
        'br_business',
        'br_location',
        'gr_rno',
        'gr_name',
        'gr_business',
        'gr_location',
        'fix_month',
        'fix_year',
        'rdate',
        'wdate',
        'done_by1',
        'done_by2',
        'empid',
    ];

    public function bride()
    {
        return $this->belongsTo(ProfilePersonal::class, 'br_rno', 'rno');
    }

    public function groom()
    {
        return $this->belongsTo(ProfilePersonal::class, 'gr_rno', 'rno');
    }
}
