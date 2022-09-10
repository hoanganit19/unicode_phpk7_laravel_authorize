<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Group;

use App\Models\User;

use App\Models\Module;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//        $group = new Group();
//
//        $group->name = 'Administrator';
//        $group->save();

//        $user = new User();
//        $user->name = 'Hoàng An';
//        $user->email = 'hoangan.web@gmail.com';
//        $user->password = Hash::make('123456');
//        $user->group_id = 1;
//        $user->save();

        $modules = [
            'users' => 'Quản lý người dùng',
            'groups' => 'Quản lý nhóm',
            'posts' => 'Quản lý bài viết'
        ];

        foreach ($modules as $key => $value){
            $module = new Module();
            $module->name = $key;
            $module->title = $value;
            $module->save();
        }

    }
}
