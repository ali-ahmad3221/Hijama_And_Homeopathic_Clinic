<?php

use App\Models\Admin\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Variation;
use App\Models\VariationDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;


if (!function_exists('GenerateRandomString')) {
    function GenerateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}



if (!function_exists('GetAdmin')) {
    function GetAdmin()
    {
        return Auth::guard('admin')->user();
    }
}


if (!function_exists('upload_image_file')) {
    function upload_image_file($file)
    {
        $path = $file->store('public');
        $file_path =  explode("/", $path);
        return url("public/storage/" . end($file_path));
    }
}

if (!function_exists('upload_base64_image')) {
    function upload_base64_image($base64Data)
    {
        $base64Data = preg_replace('/^data:image\/\w+;base64,/', '', $base64Data);
        $imageData = base64_decode($base64Data);
        $fileName = (string) Str::uuid().'.jpg';
        Storage::disk('public')->put($fileName, $imageData);
        return url("public/storage/" . $fileName);
    }
}

if (!function_exists('applicant_upload_image_file')) {
    function applicant_upload_image_file($file)
    {
        $path = $file->store('public');
        $file_path =  explode("/", $path);
        return url("storage/app/public/" . end($file_path));
    }
}

if (!function_exists('process_category_tree')) {
    $cat_tree = [];
    function process_category_tree($categories, $parentId = 0)
    {

        if (gettype($categories) === 'collection') {
            throw new Exception("Data should should be array " . gettype($categories) . " is given");
        }
        $tree = [];
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] === $parentId) {
                $children = process_category_tree($categories, $item['id']);
                if (!empty($children)) {
                    $item['subs'] = $children;
                }

                $tree[] = $item;
                unset($categories[$key]);
            }
        }

        return $tree;
    }
    if (!function_exists('find_brand_or_create')) {
        function find_brand_or_create($brand_name)
        {
            $brand_name = trim($brand_name);
            $rabnd_record = Brand::where('name', $brand_name)->first();
            if (!is_null($rabnd_record)) {
                return $rabnd_record;
            } else {
                $rabnd_record = new Brand();
                $rabnd_record->name = $brand_name;
                $rabnd_record->save();
                return $rabnd_record;
            }
        }
    }
}
if (!function_exists('find_categories_or_create')) {

    function find_categories_or_create($categories = array())
    {

        $categories_ids = [];
        $categories_records = Category::select("id", 'name')->get();
        foreach ($categories as $category) {
            $existing_category = $categories_records->where('name', $category)->first();
            if (is_null($existing_category)) {
                $new_category = new Category();
                $new_category->name = $category;
                $new_category->slug = (string) Str::uuid();
                $new_category->save();
                $categories_ids[] = $new_category->id;
            } else {

                $categories_ids[] = $existing_category->id;
            }
        }

        return $categories_ids;
    }
}

if (!function_exists('find_variations_or_create')) {

    function find_variations_or_create($request_variations = array())
    {
        $variation_ids = [];
        $variation_names = [];
        foreach ($request_variations as  $request_variation) {
            $variation_names = array_keys($request_variation);
            foreach ($variation_names as $variation_name) {
                $variation_names[] = $variation_name;
            }
        }

        $variation_names = array_values(array_unique($variation_names));
        $variation_records = Variation::whereIn('name', array_keys($variation_names))->get();
        if (count($variation_records) == 0) {
            throw new Exception('One or more variations are not mapped.');
        }
        $variation_detail_records = VariationDetail::select('id', 'variation_id', 'name')->get();
        foreach ($request_variations as $request_variation) {
            foreach ($variation_names as $name) {
                $single_variation_record = null;
                $detail_single_record = null;
                $single_variation_record = $variation_records->where('name', $name)->first();
                if (!is_null($single_variation_record)) {
                    $detail_single_record = $variation_detail_records->where('variation_id', $single_variation_record->id)
                        ->where('name', $request_variation[$name])->first();
                }
                if (is_null($detail_single_record) && !is_null($single_variation_record)) {
                    $detail_new_record = new VariationDetail();
                    $detail_new_record->variation_id = $single_variation_record->id;
                    $detail_new_record->name = $request_variation[$name];
                    $detail_new_record->save();
                    $variation_detail_records->add($detail_new_record);
                    $variation_ids[] = [
                        'variation_id' => $single_variation_record->id,
                        'variation_detail_id' => $detail_new_record->id,
                        'child_product_id' => $request_variation['child_product_id'],
                        'article_no' => $request_variation['article_no'],
                    ];
                } else if (!is_null($single_variation_record)) {
                    $variation_ids[] = [
                        'variation_id' => $single_variation_record->id,
                        'variation_detail_id' => $detail_single_record->id,
                        'child_product_id' => $request_variation['child_product_id'],
                        'article_no' => $request_variation['article_no'],
                    ];
                }
            }
        }

        return $variation_ids;
    }
}

if (!function_exists('generate_unique_slug')) {
    function generate_unique_slug($string)
    {
        $string = Str::slug(Str::lower(Str::squish($string)));
        $roducts = Product::select('slug')->where('slug', ' like ', '%' . $string . '%')->get();
        if ($roducts->isEmpty()) {
            return $string . '-' . (string) Str::uuid();
        } else {

            $find = true;
            $i = 1;
            while ($find) {
                $new_string = $string . "-" . $i;
                $find = $roducts->where('slug', $new_string)->first();
                if (is_null($find)) {
                    $string = $new_string;
                    break;
                }
                $i++;
            }
        }
        return $string . '-' . (string) Str::uuid();
    }
}


if (!function_exists('get_all_children')) {
    function get_all_children($categories, $parentId)
    {
        $children = [];
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {
                $category->children = get_all_children($categories, $category->id);
                $children[] = $category;
            }
        }
        return $children;
    }
}