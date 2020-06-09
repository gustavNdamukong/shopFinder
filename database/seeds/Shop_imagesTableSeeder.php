<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use \App\Models\Shop_image;
use \App\Models\Shop;

class Shop_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB engines will not allow you truncate tables because of fk constraints, so disable fk check before truncating and enable it right afterwards
        //the LV Eloquent way:
        Schema::disableForeignKeyConstraints();
        Shop_image::truncate();
        Schema::enableForeignKeyConstraints();

        //OR the regular way
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shop_image::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/

        $shop1 = Shop::where('id', 1)->first();
        $shop2 = Shop::where('id', 2)->first();

        Shop_image::create(['shop_id' => $shop1->id, 'image_name' => '1.png']);
        Shop_image::create(['shop_id' => $shop2->id, 'image_name' => '21432.jpeg']);
        Shop_image::create(['shop_id' => $shop1->id, 'image_name' => '36611.jpg']);


    }
}






