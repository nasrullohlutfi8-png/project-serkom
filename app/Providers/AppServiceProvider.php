<?php

namespace App\Providers;

use App\Models\Profil_Sekolah;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (Schema::hasTable('profil_sekolahs')) {
            $profilSekolah = Profil_Sekolah::first();
            View::share('profilSekolah', $profilSekolah);
        } else {
            View::share('profilSekolah', null);
        }
    }
}