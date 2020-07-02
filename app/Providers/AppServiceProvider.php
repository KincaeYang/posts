<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //文章接口绑定
        $this->app
             ->bind('App\Repositories\Interfaces\PostRepositoryInterface',
                 'App\Repositories\Post\PostReposity');

        //上传
        $this->app
             ->bind('App\Repositories\Interfaces\UploadRepositoryInterface',
                 'App\Repositories\Upload\UploadReposity');

        //注册
        $this->app
             ->bind('App\Repositories\Interfaces\RegisterRepositoryInterface',
                 'App\Repositories\Register\RegisterReposity');

        //登录
        $this->app
             ->bind('App\Repositories\Interfaces\LoginRepositoryInterface',
        'App\Repositories\Login\LoginReposity');

        //评论
        $this->app
            ->bind('App\Repositories\Interfaces\CommentRepositoryInterface',
                'App\Repositories\Comment\CommentRepository');

        //赞
        $this->app
            ->bind('App\Repositories\Interfaces\ZanRepositoryInterface',
                'App\Repositories\Zan\ZanRepository');

        //用户or个人中心
        $this->app
            ->bind('App\Repositories\Interfaces\UserRepositoryInterface',
                'App\Repositories\User\UserReposity');
    }
}
