<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
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
        if ($this->app->runningInConsole()) {
        return;
    }
        // Lấy tất cả category kèm brands và product lines
        $categories = Category::with(['brands.productLines'])->get();

        // Chia sẻ biến $categories cho tất cả view
        View::share('categories', $categories);
    }
}
