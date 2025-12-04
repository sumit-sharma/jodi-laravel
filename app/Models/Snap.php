<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Snap extends Model
{
    protected $table = 'snaps';

    protected $fillable = ['rno', 'photo', 'sorting', 'created_at', 'updated_at'];



}
