<?php

namespace Database\Seeders;
use App\Models\VariationDetail;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_stamp = Carbon::now();
        $variation_detail_seed = [            
            ['id'=>1, 'variation_id'=>2, 'name'=>'WHITE', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>2, 'variation_id'=>2, 'name'=>'OFF-WHITE', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>3, 'variation_id'=>2, 'name'=>'CREAM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>4, 'variation_id'=>2, 'name'=>'BEIGE', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>5, 'variation_id'=>2, 'name'=>'TAUPLE', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
           
            ['id'=>6, 'variation_id'=>3, 'name'=>'80X180 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>7, 'variation_id'=>3, 'name'=>'120X240 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>8, 'variation_id'=>3, 'name'=>'120X280 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>9, 'variation_id'=>3, 'name'=>'80X240 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>10, 'variation_id'=>3, 'name'=>'100X300 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>11, 'variation_id'=>3, 'name'=>'162X325 MM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>12, 'variation_id'=>3, 'name'=>'120X278 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>13, 'variation_id'=>3, 'name'=>'160X320 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>14, 'variation_id'=>3, 'name'=>'162X324 CM', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],

            ['id'=>15, 'variation_id'=>1, 'name'=>'ABSTRACT', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>16, 'variation_id'=>1, 'name'=>'ACCESSORIES', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>17, 'variation_id'=>1, 'name'=>'AFILO', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>18, 'variation_id'=>1, 'name'=>'AFORMOSIA', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>19, 'variation_id'=>1, 'name'=>'AFYON WHITE', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>20, 'variation_id'=>1, 'name'=>'AGORA', 'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
        ];

        $variation_details = VariationDetail::all();
        if (count($variation_details) > 0) {
            foreach ($variation_detail_seed as $val) {
                if (is_null($variation_details->where('id', $val['id'])->first())) {
                    VariationDetail::insert($val);
                }
            }
        } else {
            VariationDetail::insert($variation_detail_seed);
        }
    }
}
