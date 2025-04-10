<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Interfaces\MailRepositoryInterface;

class Mailcontroller extends Controller
{
    //sendContactMail


    protected $mailRepository;

    public function __construct(MailRepositoryInterface $mailRepository)
    {
        $this->mailRepository = $mailRepository;
    }

    public function sendContactMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
            'button_link' => 'required|url',
            'attachments.*' => 'file|max:5120',
            'template' => 'required|in:assignment,greeting',
        ]);
        

        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $storedPath = $file->store('attachments'); 
                $attachments[] = [
                    'path' => storage_path('app/' . $storedPath),
                    'name' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ];
            }
        }

        $data = $request->only(['name', 'email', 'message', 'subject', 'button_link', 'template']);
        $data['attachments'] = $attachments;

        $this->mailRepository->sendContactMail($data);

        return back()->with('success', 'Email sent successfully!');
    }

}
