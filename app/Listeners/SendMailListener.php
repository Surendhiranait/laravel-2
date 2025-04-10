<?php

namespace App\Listeners;

use App\Events\MailSendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\GreetingMail;
use Illuminate\Support\Facades\Log;

class SendMailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(MailSendingEvent $event)
    {
        Log::info('MailSendingEvent triggered', $event->data);

        $data = $event->data;

        $template = $event->data['template'];
        $email = $event->data['email'];

        try {
        if ($template === 'greeting') {
            Log::info("Sending GreetingMail to: $email");
            Mail::to($email)->send(new GreetingMail($data));
        } else {
            Log::info("Sending ContactFormMail to: $email");
            Mail::to($email)->send(new ContactFormMail($data));
        }

        Log::info("Mail send command issued for: $email");
    } catch (\Exception $e) {
        Log::error("Mail failed: " . $e->getMessage());
    }
    }
}
