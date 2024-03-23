<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'ALUMINIUM HANGER 40CM',
                'article_no' => '123456',
                'finish_no' => '34567',
                'hs_code' => 12334.9977,
                'unit_of_measure' => 'SQFT',
                'sqm_per_box' => 0.00,
                'status' => 0,
                'erp_id' => 1,
                'pcs_per_box' => '30.00',
                'brand_id'=>1,
                'series'=>"AFYON WHITE"
            ],
        ];
    }
}
