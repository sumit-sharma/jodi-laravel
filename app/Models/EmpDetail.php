<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpDetail extends Model
{

    protected $table = 'emp_details';

    protected $fillable = [
        "user_id",
        "loginname",
        "lastlogindate",
        "joiningdate",
        "leavingdate",
        "dob",
        "anniversary",
        "gender",
        "intime",
        "outtime",
        "offday",
        "department",
        "signature",
    ];






}
