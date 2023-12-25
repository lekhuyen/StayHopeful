<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->difineGateCategory();
        $this->difineGateProject();
        $this->difineGateNews();
        $this->difineGateUser();
        $this->difineGateRoles();
        $this->difineGatePermission();
        $this->difineGateVideos();
        $this->difineGateSliders();
        $this->difineComment();

        // Gate::define('post_edit', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.access.post_edit'));

        // });
    }


    public function difineGateCategory(){
        Gate::define('category_list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category_add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category_delete', 'App\Policies\CategoryPolicy@delete');
        Gate::define('category_edit', 'App\Policies\CategoryPolicy@update');
    }
    public function difineGateProject(){
        Gate::define('project_list', 'App\Policies\ProjectPolicy@view');
        Gate::define('project_add', 'App\Policies\ProjectPolicy@create');
        Gate::define('project_delete', 'App\Policies\ProjectPolicy@delete');
        Gate::define('project_edit', 'App\Policies\ProjectPolicy@update');
    }
    public function difineGateNews(){
        Gate::define('news_list', 'App\Policies\NewsPolicy@view');
        Gate::define('news_add', 'App\Policies\NewsPolicy@create');
        Gate::define('news_delete', 'App\Policies\NewsPolicy@delete');
        Gate::define('news_edit', 'App\Policies\NewsPolicy@update');
    }
    public function difineGateUser(){
        Gate::define('user_list', 'App\Policies\UserPolicy@view');
        Gate::define('user_add', 'App\Policies\UserPolicy@create');
        Gate::define('user_delete', 'App\Policies\UserPolicy@delete');
        Gate::define('user_edit', 'App\Policies\UserPolicy@update');
    }
    public function difineGateRoles(){
        Gate::define('roles_list', 'App\Policies\RolePolicy@view');
        Gate::define('roles_add', 'App\Policies\RolePolicy@create');
        Gate::define('roles_delete', 'App\Policies\RolePolicy@delete');
        Gate::define('roles_edit', 'App\Policies\RolePolicy@update');
    }
    public function difineGateVideos(){
        Gate::define('video_list', 'App\Policies\VideoPolicy@view');
        Gate::define('video_add', 'App\Policies\VideoPolicy@create');
        Gate::define('video_delete', 'App\Policies\VideoPolicy@delete');
        Gate::define('video_edit', 'App\Policies\VideoPolicy@update');
    }
    public function difineGateSliders(){
        Gate::define('slider_list', 'App\Policies\SlidersPolicy@view');
        Gate::define('slider_add', 'App\Policies\SlidersPolicy@create');
        Gate::define('slider_delete', 'App\Policies\SlidersPolicy@delete');
        Gate::define('slider_edit', 'App\Policies\SlidersPolicy@update');
    }
    public function difineGatePermission(){
        Gate::define('permissions_add', 'App\Policies\PermissionsPolicy@create');
    }
    public function difineComment(){
        Gate::define('comment_list', 'App\Policies\CommentPolicy@view');
        Gate::define('comment_delete', 'App\Policies\CommentPolicy@delete');
    }
}
