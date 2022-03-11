<?php

namespace App\Providers;

use App\Models\jobseeker\CongviecGoiY;
use App\Models\jobseeker\NTDDaluu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        //Gợi ý từ nhà tuyển dụng
        $rcnoti = NTDDaluu::all();
        View::share('rcnoti', $rcnoti);

        //Gọi ý từ bộ lọc
        $filternoti = CongviecGoiY::all();
        View::share('filternoti', $filternoti);
    }
}
