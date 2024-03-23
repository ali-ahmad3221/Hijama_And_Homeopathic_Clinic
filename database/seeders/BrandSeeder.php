<?php

namespace Database\Seeders;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_stamp = Carbon::now();
        $brands_seed = [
            ['id'=>1,'name'=>'AH','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>2,'name'=>'ANTOLINI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>3,'name'=>'APE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>4,'name'=>'APPOLLO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>5,'name'=>'BASSANO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>6,'name'=>'BERTOCCI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>7,'name'=>'BOTTEGA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>8,'name'=>'BRENNERO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>9,'name'=>'CATALANO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>10,'name'=>'CERDOMUS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>11,'name'=>'CLASS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>12,'name'=>'COFFEE BEANS VESCOVI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>13,'name'=>'DECORMARMI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>14,'name'=>'DECOVITA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>15,'name'=>'DEVON&DEVON','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>16,'name'=>'DIAMOND','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>17,'name'=>'EFLOOR','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>18,'name'=>'ELIOS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>19,'name'=>'FLORIM','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>20,'name'=>'FN PROFILES','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>21,'name'=>'GALASSIA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>22,'name'=>'GARDENIA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>23,'name'=>'GEBERIT GMBH','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>24,'name'=>'GENWEC','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>25,'name'=>'GESSI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>26,'name'=>'GODI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>27,'name'=>'GRANITI FIANDRE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>28,'name'=>'GROHE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>29,'name'=>'GSI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>30,'name'=>'HANGZHOU','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>31,'name'=>'HOMEWORKS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>32,'name'=>'HUNTER','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>33,'name'=>'HYH-CLASS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>34,'name'=>'INKIOSTRO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>35,'name'=>'ITLAS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>36,'name'=>'JIEYANG JIXIANGLONG','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>37,'name'=>'JINYIBAO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>38,'name'=>'KALE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>39,'name'=>'KERAKOLL','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>40,'name'=>'KOMODOOR','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>41,'name'=>'LA FABBRICA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>42,'name'=>'LAMINAM','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>43,'name'=>'MARCOPOLO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>44,'name'=>'MARMERIA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>45,'name'=>'MARSDEN','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>46,'name'=>'MASSIVE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>47,'name'=>'MICAWA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>48,'name'=>'MILUO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>49,'name'=>'MIRAGE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>50,'name'=>'MOKA RICA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>51,'name'=>'ORANS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>52,'name'=>'PLATINUM','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>53,'name'=>'PROGRESS PROFILES','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>54,'name'=>'REMER','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>55,'name'=>'RONDINE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>56,'name'=>'SMC','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>57,'name'=>'SMC-CORE LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>58,'name'=>'SMC-FOREVER MIRROR','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>59,'name'=>'SMC-HCC','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>60,'name'=>'SMC-IMAGE LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>61,'name'=>'SMC-JINHAN LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>62,'name'=>'SMC-KENIER LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>63,'name'=>'SMC-KING VIC LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>64,'name'=>'SMC-NOBEL LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>65,'name'=>'SMC-PINYUAN LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>66,'name'=>'SMC-U2 LIGHTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>67,'name'=>'SUPERGRES','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>68,'name'=>'SWISS KRONO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>69,'name'=>'TONA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>70,'name'=>'TREESSE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>71,'name'=>'TREND ARTS','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>72,'name'=>'U.A. SKIRTING','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>73,'name'=>'UNICA-TARGET','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>74,'name'=>'VALENTINO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>75,'name'=>'VALIRYO','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>76,'name'=>'VERSACE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>77,'name'=>'VESCOVI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>78,'name'=>'VIBIA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>79,'name'=>'VITRA','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>80,'name'=>'WELLMAX','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>81,'name'=>'WELMAX','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>82,'name'=>'WESTINGHOUSE','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>83,'name'=>'WISDOM','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>84,'name'=>'YIDELI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
            ['id'=>85,'name'=>'ZUCCHETTI','image'=>null,'status'=>'active',  'created_at'=>$time_stamp,'updated_at'=>$time_stamp],
        ];

        $brands = Brand::all();
        if (count($brands) > 0) {
            foreach ($brands_seed as $val) {
                if (is_null($brands->where('id', $val['id'])->first())) {
                    Brand::insert($val);
                }
            }
        } else {
            Brand::insert($brands_seed);
        }
    }
}
