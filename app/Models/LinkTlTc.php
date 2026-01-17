<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkTlTc extends Model
{
    protected $table='link_tl_tc';
    protected $fillable=['tl','tc'];
}
