<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama_product' => 'Kaos Pria',
            'harga_product' => 50000,
            'des_product' => 'Bahannya adem',
            'category_id' => 3,
            'gambar_product' => Str::random(10),
        ]);

        DB::table('products')->insert([
            'nama_product' => 'Indocafe',
            'harga_product' => 2000,
            'des_product' => 'Coffie dengan perpaduan creamy latte',
            'category_id' => 2,
            'gambar_product' => Str::random(10),
        ]);

        DB::table('products')->insert([
            'nama_product' => 'Sariroti',
            'harga_product' => 10000,
            'des_product' => 'Roti nya lembut',
            'category_id' => 1,
            'gambar_product' => Str::random(10),
        ]);
    }
}
