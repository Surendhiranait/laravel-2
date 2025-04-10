<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\MailSendingEvent;
use App\Listeners\SendMailListener;

class EventServiceProvider extends ServiceProvider
{
    
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        MailSendingEvent::class => [
            SendMailListener::class,
        ],
        
    ];


    public function boot()
    {
        //
    }
}
