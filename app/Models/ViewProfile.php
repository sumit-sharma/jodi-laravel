<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewProfile extends Model
{

    protected $table = 'viewprofile';
    protected $guarded = [];


    public function personal()
    {
        return $this->hasOne(ProfilePersonal::class, 'rno', 'rno');
    }

    public function bio()
    {
        return $this->hasOne(ProfileBio::class, 'rno', 'rno');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'oc', 'occ_code');
    }

    public function income()
    {
        return $this->belongsTo(Income::class, 'fi', 'inc_code');
    }

    public function education()
    {
        return $this->hasMany(ProfileEducation::class, 'rno', 'rno');
    }

    public function profilebs()
    {
        return $this->hasMany(ProfileBs::class, 'rno', 'rno');
    }

    public function organisation()
    {
        return $this->hasMany(ProfileOrganisation::class, 'rno', 'rno');
    }

    public function payment()
    {
        return $this->hasOne(ProfilePayment::class, 'rno', 'rno');
    }


}
