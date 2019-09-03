<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $firstuser = User::create([
           'name'=>'Mohamed',
           'email'=>'Mohamed@Mohamed.com',
           'password'=>bcrypt('123456789'),
        ]);

        $secounduser = User::create([
            'name'=>'Mohamed1',
            'email'=>'Mohamed1@Mohamed.com',
            'password'=>bcrypt('123456789'),
        ]);

        $thireduser = User::create([
            'name'=>'Mohamed2',
            'email'=>'Mohamed2@Mohamed.com',
            'password'=>bcrypt('123456789'),
        ]);

        $adminrole = Role::where('name' , 'admin')->first();
        $authorrole = Role::where('name' , 'author')->first();
        $userrole = Role::where('name' , 'user')->first();

        $firstuser->roles()->attach($adminrole);
        $secounduser->roles()->attach($authorrole);
        $thireduser->roles()->attach($userrole);

        factory(User::class,50)->create();
    }
}
