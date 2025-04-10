<?php

namespace App\Repositories;

use App\Interfaces\MailRepositoryInterface;
use App\Mail\ContactFormMail;
use App\Mail\GreetingMail;
use Illuminate\Support\Facades\Mail;
use App\Events\MailSendingEvent;

class MailRepository implements MailRepositoryInterface
{
    public function sendContactMail(array $data): bool
    {
        $attachments = $data['attachments'] ?? [];

        $emailData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'subject' => $data['subject'],
            'button_link' => $data['button_link'],
            'attachments' => $attachments,
            'template' => $data['template'],
        ];
        

        $mailClass = $data['template'] === 'greeting'
            ? new GreetingMail($emailData)
            : new ContactFormMail($emailData);

        event(new MailSendingEvent($emailData));
        //Mail::to($emailData['email'])->send($mailClass);

        return true;
    }
}
