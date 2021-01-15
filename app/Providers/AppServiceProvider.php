<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ini_set('max_execution_time', 150000);
        ini_set('memory_limit', '7000M');
        ini_set('upload_max_filesize', '20000M');
        ini_set('max_file_uploads', '20000');
        ini_set('post_max_size', '20000M');
    }
}
