<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{Post, Module, User, Group};
use App\Policies\{PostPolicy, UserPolicy, GroupPolicy};

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Group::class => GroupPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $modules = Module::all();

        if ($modules->count()>0){
            foreach ($modules as $module){
                $moduleName = $module->name;

                //tên_module.tên_role
                Gate::define($moduleName.'.view', function (User $user) use ($moduleName){
                    $group = $user->group;
                    return isRole($group, $moduleName);
                });
            }
        }

//        Gate::define('users.view', function($user){
//            //Xử lý logic để trả về true, false
//            /*
//             * - Lấy được group_id
//             * - Truy vấn tới trường permssions trong bảng groups xem có quyền hay không?
//             * - Nếu có quyền tương ứng với module => return true
//             * - Ngược lại, return false
//             * */
//            return false;
//        });
    }
}
