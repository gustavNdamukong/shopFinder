<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use \App\Models\Feed;
use \App\Models\User;

class FeedsTableSeeder extends Seeder
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
        Shop::truncate();
        Schema::enableForeignKeyConstraints();

        //OR the regular way
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shop_image::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/

        $user1 = User::where('id', 1)->first();

        Feed::create(['user_id' => $user1->id, 'url' => 'https://www.nasa.gov/rss/dyn/breaking_news.rss']);
        Feed::create(['user_id' => $user1->id, 'url' => 'https://feeds.bbci.co.uk/news/technology/rss.xml']);
    }
}



