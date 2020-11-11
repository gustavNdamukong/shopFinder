<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use \App\Models\Shop;
use \App\Models\User;

class ShopsTableSeeder extends Seeder
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

        Shop::create(['name' => 'Nandos', 'city' => 'Bedford', 'postcode' => 'MK403PL', 'lat' => '52.1366', 'lon' => '-0.460224', 'address' => '27 Castle Road, Bedford, MK403PL, UK ', 'user_id' => $user1->id, 'description' => 'This was our first branch in Bedford']);
        Shop::create(['name' => 'Chiquitto', 'city' => 'Milton Keynes', 'postcode' => 'MK93 DX', 'lat' => '52.0397', 'lon' => '-0.7584', 'address' => '500 Saxon Gate, Milton Keynes, MK93 DX, UK', 'user_id' => $user1->id, 'description' => 'Excellent shop in Milton Keynes']);
        Shop::create(['name' => 'Margaritta Losgardos', 'city' => 'Bedford', 'postcode' => 'MK42 0BN', 'lat' => '52.1327', 'lon' => '-0.464752', 'address' => '5 Cardington Road, Bedford, MK42 0BN', 'user_id' => $user1->id, 'description' => 'This was our second branch in Bedford']);
    }
}



