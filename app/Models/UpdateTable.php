<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdateTable extends Model
{
    protected $table = 'update_table';

    protected $fillable = [
        'rno',
        'status'
    ];


    public function viewProfile()
    {
        return $this->belongsTo(ViewProfile::class, 'rno', 'rno');
    }

    public function personal()
    {
        return $this->belongsTo(ProfilePersonal::class, 'rno', 'rno');
    }

    public function bio()
    {
        return $this->belongsTo(ProfileBio::class, 'rno', 'rno');
    }

    // public function occupation()
    // {
    //     return $this->hasOne(Occupation::class, 'rno', 'rno');
    // }

    // public function income()
    // {
    //     return $this->hasOne(Income::class, 'rno', 'rno');
    // }

    // public function education()
    // {
    //     return $this->hasOne(Education::class, 'rno', 'rno');
    // }

    // public function organisation()
    // {
    //     return $this->hasOne(Organisation::class, 'rno', 'rno');
    // }

    // public function payment()
    // {
    //     return $this->hasOne(Payment::class, 'rno', 'rno');
    // }

    // public function profilebs()
    // {
    //     return $this->hasOne(Profilebs::class, 'rno', 'rno');
    // }

    // public function zone()
    // {
    //     return $this->hasOne(Zone::class, 'rno', 'rno');
    // }
}
