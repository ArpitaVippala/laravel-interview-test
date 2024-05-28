<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['product_name'=>'Gold Coffee', 'status'=>1],['product_name'=>'Arabic Coffee', 'status'=>1]];
        ProductsModel::insert($data);
    }
}
