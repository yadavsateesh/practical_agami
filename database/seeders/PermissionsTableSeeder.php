<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into the permissions table
		DB::table('permissions')->insert([
			['permission' => 'View'],
			['permission' => 'Create New User'],
			['permission' => 'Edit User'],
			['permission' => 'Delete User'],
			// Add more permissions as needed
		]);
    }
}
