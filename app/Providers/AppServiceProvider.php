<?php

namespace App\Providers;

use App\Models\Profil_Sekolah;
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
        $profilSekolah = Profil_Sekolah::first();

        View::share('profilSekolah', $profilSekolah);
    }
}