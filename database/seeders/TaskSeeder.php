<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('tasks')->insert([
                'user_id' => '1',
                'category_id' => '1',
                'name' => '皿洗い',
                'importance_urgency'=> '1',
                'target_time'=> '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
    }
}
