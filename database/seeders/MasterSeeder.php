<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement("truncate table castes");
        // DB::statement("insert ignore into jodi_laravel.castes (id, name, religion_code, created_at, updated_at)  Select li.sno, li.caste, li.religion_code, NOW(), NOW() from old_jodi.cst as li");

        // DB::statement("truncate table occupations");
        // DB::statement("insert ignore into jodi_laravel.occupations (occ_code, name, created_at, updated_at)  Select li.occ_code, li.occupation, NOW(), NOW() from old_jodi.occupation as li");

        // DB::statement("truncate table incomes");
        // DB::statement("insert ignore into jodi_laravel.incomes (inc_code, income, created_at, updated_at)  Select li.inc_code, li.income, NOW(), NOW() from old_jodi.income as li");

        // DB::statement("truncate table countries");
        // DB::statement("insert ignore into jodi_laravel.countries (country_code, country, created_at, updated_at)  Select li.country_code, li.country, NOW(), NOW() from old_jodi.country as li");

        // DB::statement("truncate table nationality");
        // DB::statement("insert ignore into jodi_laravel.nationality (nationality_code, nationality, created_at, updated_at)  Select li.nationality_code, li.nationality, NOW(), NOW() from old_jodi.nationality as li");

        // DB::statement("truncate table zones");
        // DB::statement("insert ignore into jodi_laravel.zones (zone_code, zone_name, created_at, updated_at)  Select li.zone_code, li.zone_name, NOW(), NOW() from old_jodi.zone as li");

        // // DB::statement("truncate table counternumber");
        // DB::statement("insert ignore into jodi_laravel.counternumber (sno, countername, created_at, updated_at)  Select li.sno, li.countername, NOW(), NOW() from old_jodi.counternumber as li");

        // DB::statement("truncate table edupref");
        // DB::statement("insert ignore into jodi_laravel.edupref (sno, education, created_at, updated_at)  Select li.sno, li.education, NOW(), NOW() from old_jodi.edupref as li");

        // echo nl2br("start from link_tl_tc import\n");
        // DB::statement("insert ignore into jodi_laravel.link_tl_tc (tl, tc, created_at, updated_at) SELECT li.tl, li.tc, NOW(), NOW() FROM old_jodi.link_tl_tc as li");
        // echo nl2br("finish link_tl_tc import\n");

        // echo nl2br("start from freshcalls import\n");
        // DB::statement("insert ignore into jodi_laravel.freshcalls (dated, empid, callsource, noofcalls, callsconnected, followupcalls, created_at, updated_at) SELECT li.dated, li.empid, li.callsource, li.noofcalls, li.callsconnected, li.followupcalls, NOW(), NOW() FROM old_jodi.freshcalls as li");
        // echo nl2br("finish freshcalls import\n");

        // echo nl2br("start from daily moment import\n");
        // DB::statement("insert ignore into jodi_laravel.daily_moment (dated, empid, timefrom, timeto, moment, created_at, updated_at) SELECT li.dated, li.empid, li.timefrom, li.timeto, li.moment, NOW(), NOW() FROM old_jodi.dailymoment as li");
        // echo nl2br("finish daily moment import\n");

        // echo nl2br("start from convert_log import\n");
        // DB::statement("insert ignore into jodi_laravel.convert_log (old_rno, new_rno, empid, dated, time, status, message, created_at, updated_at)  Select li.old_rno, li.new_rno, li.empid, li.dated, li.time, 'SUCCESS', 'Success', NOW(), NOW() from old_jodi.convert_log as li");
        // echo nl2br("finish convert_log import\n");

        // echo nl2br("start from delete logs import\n");
        // DB::statement("insert ignore into jodi_laravel.delete_logs (rno, refname, empid, dated, time, created_at, updated_at) Select li.rno, li.refname, li.empid, li.dated, li.time, NOW(), NOW() from old_jodi.delete_log as li");
        // echo nl2br("finish delete logs import\n");

        // echo nl2br("start from update table import\n");
        // DB::statement("insert ignore into jodi_laravel.update_table (rno, status, created_at, updated_at) Select li.rno, li.status, NOW(), NOW() from old_jodi.updatetable as li");
        // echo nl2br("finish update table import\n");
    }
}
