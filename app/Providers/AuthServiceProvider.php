<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

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
