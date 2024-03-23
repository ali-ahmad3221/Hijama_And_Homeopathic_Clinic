<?php

namespace Database\Seeders;
use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_stamp = Carbon::now();
        $variation_seed = [
            ['id'=>1,'name'=>'Surface', 'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>2,'name'=>'Color',  'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>3,'name'=>'Size',   'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>4,'name'=>'Thickness', 'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>5,'name'=>'Availability', 'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>6,'name'=>'Series', 'status'=>1,  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
        ];

        $variation = Variation::all();
        if (count($variation) > 0) {
            foreach ($variation_seed as $val) {
                if (is_null($variation->where('id', $val['id'])->first())) {
                    Variation::insert($val);
                }
            }
        } else {
            Variation::insert($variation_seed);
        }
    }
}
