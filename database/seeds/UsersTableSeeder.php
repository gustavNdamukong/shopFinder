<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
        User::truncate();
        DB::table('role_to_user')->truncate();
        Schema::enableForeignKeyConstraints();

        //OR the regular way
        /*DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Shop_image::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin user',
            'email' => 'gustavndamukong@hotmail.com',
            'password' => Hash::make('06111007')
        ]);

        $author = User::create([
            'name' => 'Author user',
            'email' => 'nolimit187humvee@yahoo.co.uk',
            'password' => Hash::make('06111007')
        ]);

        $user = User::create([
            'name' => 'Normal User',
            'email' => 'ndamukonggustav@gmail.com',
            'password' => Hash::make('06111007')
        ]);

        //now assign their roles

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}




