<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// $password = Hash::make('password');
		// DB::statement("truncate table jodi_laravel.emp_details");
		// DB::statement("truncate table jodi_laravel.users");
		// DB::statement("insert into jodi_laravel.users (username, name, email, mobile, status, password)  Select li.username, li.loginname, li.email, li.mobile, li.status, :password from old_jodi.logininfo as li", ['password' => $password]);

		// // 3. Insert emp_details rows linked to new users
		// DB::statement("INSERT INTO jodi_laravel.emp_details (user_id) SELECT id FROM jodi_laravel.users");

		// DB::statement(
		// 	"UPDATE jodi_laravel.emp_details AS e 
		// 	JOIN jodi_laravel.users AS  u ON e.user_id = u.id 
		// 	JOIN old_jodi.logininfo AS o ON  o.username = u.username 
		// 	SET
		// 		-- e.loginname  = o.loginname,
		// 		-- e.lastlogindate = o.lastlogindate,
		// 		-- e.joiningdate = o.joiningdate,
		// 		-- e.leavingdate = o.leavingdate,
		// 		-- e.dob = o.birthdate,
		// 		-- e.anniversary = o.anniversary,
		// 		-- e.gender = o.gender,
		// 		-- e.intime = o.intime,
		// 		-- e.outtime = o.outtime,
		// 		-- e.offday = o.offday,
		// 		-- e.department = o.department,
		// 		-- e.signature = o.signature
		// 		e.ext = o.ext,
		// 		e.oldcode = o.oldcode"

		// );

		DB::statement(
			"UPDATE jodi_laravel.users AS u  JOIN old_jodi.logininfo AS o 
			ON  o.username = u.username 
			SET 
				u.is_blocked = o.loginstatus"
		);
	}
}
