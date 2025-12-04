<?php
namespace App\Services;

use App\Models\Caste;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MiscService
{

    public static function getCasteData(int|array $religionCode)
    {
        $query = Caste::query();
        if(is_array($religionCode)){
            $query = $query->whereIn('religion_code', $religionCode);
        }else{
            $query = $query->where('religion_code', $religionCode);
        }
        return $query->orderBy('name', 'asc')->get();
    }

    public static function getDistinctData($table, $column, $where = null)
    {
        $query = DB::table($table)->select($column);
        $cacheKey = 'table_data'.md5(json_encode(['table' => $table, 'column' => $column, 'where' => $where]));
        return Cache::remember($cacheKey, now()->addHours(2), function () use($query, $column, $where) {
            if($where){
                $query->whereRaw($where);
            }
            return $query = $query->distinct()->pluck($column);
        });

    }

    public static function getTableData(string $table, array $columns, $sortBy = 'id', $sortOrder = 'asc', $where = null)
    {
        $query = DB::table($table)->select($columns);
        $cacheKey = 'table_data'.md5(json_encode(['table' => $table, 'columns' => $columns, 'sortBy' => $sortBy, 'sortOrder' => $sortOrder, 'where' => $where]));
        return Cache::remember($cacheKey, now()->addHours(2), function () use($query, $sortBy, $sortOrder, $where) {
            if ($where) {
                $query = $query->whereRaw($where);
            }
            return $query->orderBy($sortBy, $sortOrder)->get();
        });
    }

}
