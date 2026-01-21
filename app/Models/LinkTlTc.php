<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkTlTc extends Model
{
    protected $table = 'link_tl_tc';

    protected $fillable = ['tl', 'tc'];


    public function linkedTC()
    {
        return $this->belongsTo(User::class, 'tc', 'username');
    }

    public function linkedTL()
    {
        return $this->belongsTo(User::class, 'tl', 'username');
    }
}
