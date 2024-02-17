<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'タスク',
            'description' => 'タスクのテスト。',
            'start_date' => '2024-2-14',
            'end_date' => '2024-2-14',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'user_id' => 1,
            'category_id' => 1, // 未分類
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
