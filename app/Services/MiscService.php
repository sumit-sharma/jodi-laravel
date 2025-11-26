<?php
namespace App\Services;

use App\Models\Caste;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MiscService
{

    public static function getCasteData($religionCode)
    {
        return Caste::where('religion_code', $religionCode)->orderBy('name', 'asc')->get();
    }

    public static function getDistinctData($table, $column, $where = null)
    {
        $query = DB::table($table)->select($column);
        if($where){
            $query->whereRaw($where);
        }

        $cacheKey = 'table_data'.md5(json_encode(['table' => $table, 'column' => $column, 'where' => $where]));
        return Cache::remember($cacheKey, now()->addHours(2), function () use($query, $column) {
            return $query = $query->distinct()->pluck($column);
        });

    }

    public static function getTableData(string $table, array $columns, $sortBy = 'id', $sortOrder = 'asc', $where = null)
    {
        $query = DB::table($table)->select($columns);
        if ($where) {
            $query = $query->whereRaw($where);
        }
        $cacheKey = 'table_data'.md5(json_encode(['table' => $table, 'columns' => $columns, 'sortBy' => $sortBy, 'sortOrder' => $sortOrder, 'where' => $where]));
        return Cache::remember($cacheKey, now()->addHours(2), function () use($query, $sortBy, $sortOrder) {
            return $query->orderBy($sortBy, $sortOrder)->get();
        });
    }

}
