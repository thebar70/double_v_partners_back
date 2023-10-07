<?php

namespace App\Providers;

use App\Services\Contracts\TicketService;
use App\Services\SupportTicketService;
use Illuminate\Support\ServiceProvider;

class DependencyInjectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TicketService::class, SupportTicketService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
