<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $table = 'search_logs';

    protected $fillable = ['searchvalue', 'inputs', 'empid'];

    protected function casts()
    {
        return [
            'inputs' => 'array',
        ];
    }


    public function employee()
    {
        return $this->belongsTo(User::class, 'empid','username'  );
    }




}
