<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_data;

    /**
     * Create a new message instance.
     */
    public function __construct($contact_data)
    {
        $this->contact_data = $contact_data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->view('emails.contact_mail')
                  ->subject($this->contact_data['subject'])
                  ->with(['contact_data' => $this->contact_data]);

                  if (!empty($this->contact_data['attachments'])) {
                    foreach ($this->contact_data['attachments'] as $file) {
                        $email->attach($file['path'], [
                            'as' => $file['name'],
                            'mime' => $file['mime'],
                        ]);
                    }
                }

        return $email;
    }
}
