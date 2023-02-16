<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        admin::create([
            'name'=>'Super-Admin',
            'email'=>'super@admin.com',
            'mobile'=>'+972594153509',
            'password'=>Hash::make(123456),
        ]);
    }
}
