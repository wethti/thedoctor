<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\Section;
use App\Models\Subsection;
use App\Models\Menutab;
use App\Observers\SectionObserver;
use App\Observers\SubsectionObserver;
use App\Observers\MenutabObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Section::observe(SectionObserver::class);
        Subsection::observe(SubsectionObserver::class);
        Menutab::observe(MenutabObserver::class);
    }
}
