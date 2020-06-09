<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        //OR the regular way
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shop_image::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);
    }
}




