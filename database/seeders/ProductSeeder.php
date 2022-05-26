<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;
use DB;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_tag')->truncate();
        Product::truncate();
        Category::truncate();
        Tag::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // return;
        Category::create(['title'=>'大型家電','slug'=>'大型家電']);
        Category::create(['title'=>'視聽娛樂','slug'=>'視聽娛樂']);
        Category::create(['title'=>'冷氣清淨','slug'=>'冷氣清淨']);
        Category::create(['title'=>'生活家電','slug'=>'生活家電']);
        Category::create(['title'=>'健康美容','slug'=>'健康美容']);
        Category::create(['title'=>'廚房家電','slug'=>'廚房家電']);
        Category::create(['title'=>'行動通訊','slug'=>'行動通訊']);
        Category::create(['title'=>'電腦資訊','slug'=>'電腦資訊']);
        Category::create(['title'=>'生活百貨','slug'=>'生活百貨']);

        for($i=0;$i<30;$i++){
            Product::create([
                'title' => Str::random(10),
                'cover' => 'https://picsum.photos/id/'.rand(1,100).'/500',
                'desc' => Str::random(100),
                'category_id'=> rand(1,9),
                'price' => rand(100,9999),
                'sale' => rand(100,9999),
            ]);
        }
        Tag::create(['title' => 'Sony',]);
        Tag::create(['title' => 'Panasonic',]);
        Tag::create(['title' => 'LG',]);
        Tag::create(['title' => 'Dyson',]);
        Tag::create(['title' => 'Sharp',]);

        for($i=0;$i<30;$i++){
            DB::table('product_tag')->insert([
                'product_id' => $i+1,
                'tag_id' => rand(1,5)
            ]);
        }
    }
}
