<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Jobs\TesTEmailJob;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clients,$email)

    {
        $this->client = $clients;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bilalmujahid89@gmail.com', 'Laravel')
            ->view('admin.mail')->with(['client' => $this->client]);

    }
}
