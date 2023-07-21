<?php

namespace App\Providers;

use App\Events\UserActionBitacora;
use App\Events\UserActionImagen;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Logout;
use App\Events\UserActionInventory;
use App\Events\UserActionManual;
use App\Events\UserActionRol;
use App\Events\UserActionUsers;
use App\Listeners\LogActionBitacora;
use App\Listeners\LogActionImagen;
use App\Listeners\LogUserLogout;
use App\Listeners\LogActionInventory;
use App\Listeners\LogActionManual;
use App\Listeners\LogActionRol;
use App\Listeners\LogActionUsers;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Logout::class => [
            LogUserLogout::class,
        ],
        UserActionInventory::class => [
            LogActionInventory::class,
        ],
        UserActionUsers::class => [
            LogActionUsers::class,
        ],
        UserActionBitacora::class => [
            LogActionBitacora::class,
        ],
        UserActionManual::class => [
            LogActionManual::class,
        ],
        UserActionImagen::class => [
            LogActionImagen::class,
        ],
        UserActionRol::class => [
            LogActionRol::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
