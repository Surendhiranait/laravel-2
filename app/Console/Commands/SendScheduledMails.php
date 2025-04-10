<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\MailSendingEvent;

class SendScheduledMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'email:send-scheduled';
    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';
    protected $description = 'Send scheduled emails via queue or event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        //for testing
        $data = [
            'name' => 'Scheduled User',
            'email' => 'test@example.com',
            'message' => 'This is a scheduled message.',
            'subject' => 'Scheduled Email from XYZ',
            'button_link' => 'http://example.com',
            'attachments' => [
                [
                    'path' => storage_path('app/attachments/sample.pdf'),
                    'name' => 'sample.pdf',
                    'mime' => 'application/pdf',
                ],
            ],
            'template' => 'greeting',
        ];
    
        event(new MailSendingEvent($data));
    
        $this->info('Scheduled email triggered.');
    }
}
