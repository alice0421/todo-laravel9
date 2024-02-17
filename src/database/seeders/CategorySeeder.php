<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => '未分類',
            'color' => '#c0c0c0', // silver
            'user_id' => 1,
        ]);
        DB::table('categories')->insert([
            'name' => 'カテゴリー1',
            'color' => '#ff0000', // red
            'user_id' => 1,
        ]);
    }
}
