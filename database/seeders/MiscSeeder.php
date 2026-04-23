<?php

namespace Database\Seeders;

use App\Models\Passcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiscSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Passcode::count() == 0) {
            echo nl2br("insert passcode start\n");
            Passcode::create([
                'password' => md5('2026'),
                'status' => 1,
            ]);
            echo nl2br("insert passcode finish\n");
        }


        echo nl2br("start refdata import\n");
        DB::statement("TRUNCATE TABLE refdata");
        DB::statement("insert ignore into jodi_laravel.refdata (reftype,created_at,updated_at) SELECT li.reftype, NOW(), NOW() FROM jodi_new.refdata as li order by li.sno");
        echo nl2br("finish refdata import\n");

        echo nl2br("start servicetypes import\n");
        DB::statement("TRUNCATE TABLE servicetypes");
        DB::statement("insert ignore into jodi_laravel.servicetypes (servicetype,created_at,updated_at) SELECT li.servicetype, NOW(), NOW() FROM jodi_new.servicetype as li order by li.sno");
        echo nl2br("finish servicetypes import\n");
    }
}
