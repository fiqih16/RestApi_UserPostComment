<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nama' => 'Makanan'
        ]);

        DB::table('categories')->insert([
            'nama' => 'Minuman'
        ]);

        DB::table('categories')->insert([
            'nama' => 'Pakaian'
        ]);
    }
}
