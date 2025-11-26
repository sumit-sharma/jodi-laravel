<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterNumber extends Model
{
    protected $table = 'counternumber';

    protected $guarded = [];


    public static function nextNumber(string $countername): ?int
    {
        $model = self::where(['countername' => $countername])->firstOrFail();
        $model->increment('sno');
        return $model->sno;
    }

}
