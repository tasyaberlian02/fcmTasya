<?php
namespace App\Providers;

use App\Models\Tanaman;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $tanaman = Tanaman::with('produksi')->get(); // Ambil semua data tanaman
            $view->with('tanaman', $tanaman);
        });
    }

    public function register()
    {
        //
    }
}
