<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BsLog extends Model
{
    protected $table = "bs_log";

    protected $fillable = [
        "rno",
        "bsname",
        "bs",
        "bsage",
        "bsmarriage",
        "bsdetails",
        "dated",
        "time",
        "empid",
    ];
}
