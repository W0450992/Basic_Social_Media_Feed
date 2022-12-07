<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\Facades\Cookie;
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
        //get a list of themes


        // pass the list of themes to app.blade.php.. use a view composer
        //passing a function in as an argument of another function
        View::composer('layouts.app', function($view){

            //get the cookie value for the current theme
            $themeId = Cookie::get('theme') ?? 1; // if no cookie use default
            //dd($cookie);

        //$themes = Theme::all();
            $view->with('themes', Theme::all())->with('selectedTheme', Theme::find($themeId));
        });

    }
}
