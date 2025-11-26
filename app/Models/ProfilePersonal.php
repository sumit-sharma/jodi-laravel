<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePersonal extends Model
{
    protected $table = "profile_personal";
    protected $guarded = [];


    public function zone()
    {
        return $this->belongsTo(Zone::class, 'contactzone', 'zone_code');
    }

}
