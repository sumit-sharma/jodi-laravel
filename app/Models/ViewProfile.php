<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewProfile extends Model
{

    protected $table = 'viewprofile';
    protected $fillable = ['rno', 'g', 'refname', 'y', 'm', 'rl', 'cst', 'hg', 'hghtft', 'wt', 'eh', 'ast', 'ed', 'oc', 'pi', 'rs', 'ms', 'ch', 'fi', 'tc', 'mc', 'rm', 'p_sent', 'last_mail', 'last_call', 'last_mtng', 'dtype', 'status', 'ost', 'vc', 'op', 'st'];


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

    public function personalincome()
    {
        return $this->belongsTo(Income::class, 'pi', 'inc_code');
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

    public function snaps()
    {
        return $this->hasMany(Snap::class, 'rno', 'rno');
    }

    public function tcData()
    {
        return $this->belongsTo(User::class, 'tc', 'username');
    }

    public function rmData()
    {
        return $this->belongsTo(User::class, 'rm', 'username');
    }
}
