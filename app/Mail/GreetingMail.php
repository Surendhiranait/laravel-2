<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GreetingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $contact_data;

    public function __construct($contact_data)
    {
        $this->contact_data = $contact_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.greeting_mail')
        ->subject($this->contact_data['subject'])
        ->with(['contact_data' => $this->contact_data]);

        if (!empty($this->contact_data['attachments'])) {
          foreach ($this->contact_data['attachments'] as $file) {
            if (file_exists($file['path'])) { 
              $email->attach($file['path'], [
                  'as' => $file['name'],
                  'mime' => $file['mime'],
              ]);
            }
          }
      }

    return $email;
    }
}
