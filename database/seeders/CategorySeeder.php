<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_stamp = Carbon::now();

        $category_seed = [
            //0 level categories parents.
            ['id' => 1, 'slug' => 'flooring', 'name' => 'Flooring', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' => 'Elevate Your Space with Our Flooring Selection
            Discover a range of exquisite flooring options at SMC Group. From classic hardwood to versatile laminate, find the perfect flooring to enhance your space with style and durability.', 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 2, 'slug' => 'bathrooms', 'name' => 'Bathrooms', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 3, 'slug' => 'kitchen', 'name' => 'Kitchen', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 4, 'slug' => 'hardware', 'name' => 'Hardware | Doors', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 5, 'slug' => 'wallpapers', 'name' => 'Wallpapers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 6, 'slug' => 'lighting-|-fans', 'name' => 'Lighting | Fans', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 7, 'slug' => 'accessories', 'name' => 'Accessories', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 8, 'slug' => 'about-us', 'name' => 'About Us', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //1 level categories children of (Flooring)\
            ['id' => 9, 'slug' => 'tiles', 'name' => 'Tiles', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 1, 'description' => 'Explore our exquisite range of tiles designed to transform your floors and walls into stunning works of art. From classic to contemporary styles, our collection offers the perfect blend of beauty and durability. Discover your ideal tiles at SMC Group and elevate your space effortlessly.', 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 10, 'slug' => 'wooden-flooring', 'name' => 'Wooden Flooring', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 1, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 11, 'slug' => 'bond-&-grout', 'name' => 'Bond & Grout', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 1, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 12, 'slug' => 'trims', 'name' => 'Trims', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 1, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //2 level categories children of children
            ['id' => 13, 'slug' => 'large-format-slabs', 'name' => 'Large Format Slabs', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 9, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 14, 'slug' => 'conventional-tiles', 'name' => 'Conventional Tiles', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 9, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 15, 'slug' => 'decor-&-mosaic', 'name' => 'Decor & Mosaic', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 9, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            ['id' => 16, 'slug' => 'laminated wooden-floor', 'name' => 'Laminated Wooden Floor', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 10, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 17, 'slug' => 'soild-Wooden-floor', 'name' => 'Soild Wooden Floor', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 10, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 18, 'slug' => 'engineerd-wooden-floor', 'name' => 'Engineerd Wooden Floor', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 10, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            ['id' => 19, 'slug' => 'biogel', 'name' => 'Biogel', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 11, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 20, 'slug' => 'biofix', 'name' => 'Biofix', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 11, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 21, 'slug' => 'grout-cleaner-soap', 'name' => 'Grout Cleaner Soap', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 11, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 22, 'slug' => 'grout-fillig', 'name' => 'Grout Fillig', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 11, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 23, 'slug' => 'glitter-mix', 'name' => 'Glitter Mix', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 11, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            ['id' => 24, 'slug' => 'gold', 'name' => 'Gold', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 12, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 25, 'slug' => 'silver', 'name' => 'Silver', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 12, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 26, 'slug' => 'alimunium', 'name' => 'Alimunium', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 12, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 27, 'slug' => 'brass', 'name' => 'Brass', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 12, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //1 level categories children of (Bathrooms)
            ['id' => 28, 'slug' => 'tiles1', 'name' => 'Tiles', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 29, 'slug' => 'sanitary-ware', 'name' => 'Sanitary ware', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 30, 'slug' => 'showers', 'name' => 'Showers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 31, 'slug' => 'bathroom-accessories', 'name' => 'Bathroom Accessories', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 32, 'slug' => 'vanities', 'name' => 'Vanities', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 33, 'slug' => 'juccuzi-&-bath-tubs', 'name' => 'Juccuzi & Bath Tubs', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 2, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //2 level categories children of children (Tiles of Bathrooms)
            ['id' => 34, 'slug' => 'concealed', 'name' => 'Concealed', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 28, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 35, 'slug' => 'exposed', 'name' => 'Exposed , hand showers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 28, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //3 level categories decendent of (Bathrooms)
            ['id' => 36, 'slug' => 'tiles2', 'name' => 'Tiles', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 34, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 37, 'slug' => 'door-stoppers', 'name' => 'Door Stoppers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>34, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //2 level categories children of children (Sanitary ware of Bathrooms)
            ['id' => 38, 'slug' => 'basin', 'name' => 'Basin', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>29, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 39, 'slug' => 'taps', 'name' => 'Taps', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>29, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of kitchen category.
            ['id' => 40, 'slug' => 'kitchen_accessories', 'name' => 'Accessories', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>3, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 41, 'slug' => 'kitchen_sanitaryware', 'name' => 'Kitchen Sanitaryware', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>3, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of kitchen category Kitchen Sanitaryware.
            ['id' => 42, 'slug' => 'taps1', 'name' => 'Taps', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>41, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 43, 'slug' => 'sinks', 'name' => 'Sinks', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>41, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of hardware | doors
            ['id' => 44, 'slug' => 'door_hardware', 'name' => 'Door Hardware', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>4, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

             //children of Door Hardware
            ['id' => 45, 'slug' => 'door locks', 'name' => 'Door Locks', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>44, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 46, 'slug' => 'handle_Locks', 'name' => 'Handle Locks', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>44, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of lights | fans
            ['id' => 47, 'slug' => 'lights', 'name' => 'Lights', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>6, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 48, 'slug' => 'fans_(hunter_fan)', 'name' => 'Fans (Hunter Fan)', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>6, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of lights
            ['id' => 49, 'slug' => 'indoor', 'name' => 'Indoor', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>47, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 50, 'slug' => 'outdoor_lights', 'name' => 'Outdoor lights', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>47, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of indoor lights
            ['id' => 51, 'slug' => 'wall_lamps',  'name' =>  'Wall Lamps', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>49, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 52, 'slug' => 'chandelier',  'name' =>  'Chandelier', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>49, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 53, 'slug' => 'floor_lamps', 'name' => 'Floor Lamps', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>49, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 54, 'slug' => 'table_Lamps',  'name' =>  'Table Lamps', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>49, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of outdoor lights
            ['id' => 55, 'slug' => 'wall_lights',  'name' =>  'Wall Lights', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>50, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 56, 'slug' => 'garden_lights',  'name' =>  'Garden Lights', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>50, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 57, 'slug' => 'garden_spot_lights', 'name' => 'Garden Spot Lights', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>50, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of accessories
            ['id' => 58, 'slug' => 'accessories_dryers', 'name' => 'Dryers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 59, 'slug' => 'accessories_flooring', 'name' => 'Flooring', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 60, 'slug' => 'accessories_bathrooms', 'name' => 'Bathrooms', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 61, 'slug' => 'accessories_kitchen', 'name' => 'Kitchen', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 62, 'slug' => 'accessories_hardware_doors', 'name' => 'Hardware | Doors', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 63, 'slug' => 'accessories_wallpapers', 'name' => 'Wallpapers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 64, 'slug' => 'accessories_lighting_fans', 'name' => 'Lighting | Fans', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>7, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //children of Dryers
            ['id' => 65, 'slug' => 'hand_dryers', 'name' => 'Hand Dryers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>58, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],
            ['id' => 66, 'slug' => 'body_dryers', 'name' => 'Body Dryers', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' =>58, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

            //add parent category
            ['id' => 67, 'slug' => 'all-collections', 'name' => 'All Collections', 'image' => null, 'status' => 'active', 'erp_id' => null, 'parent_id' => 0, 'description' =>null, 'created_at' => $time_stamp, 'updated_at' => $time_stamp],

        ];


        $category = Category::all();
        if (count($category) > 0) {
            foreach ($category_seed as $val) {
                if (is_null($category->where('id', $val['id'])->first())) {
                    Category::insert($val);
                }
            }
        } else {
            Category::insert($category_seed);
        }
    }
}
