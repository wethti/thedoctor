<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\View;
use App\Models\Menutab;

class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.main', function ($view) {
            if ($view->getName() === 'layouts.main') {
            $menutabs = Menutab::with('sections.subsections')->orderBy('position', 'asc')->get();
            $view->with([
                'menutabs' => $menutabs,
        ]);}});
    }
}
