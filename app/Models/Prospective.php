<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospective extends Model
{
    protected $table='prospectives';
    protected $fillable=['rno','empid'];
    
}
