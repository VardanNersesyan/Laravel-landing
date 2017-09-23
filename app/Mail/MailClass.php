<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$text)
    {
        $this->name  = $name;
        $this->email = $email;
        $this->text  = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'name'  => $this->name,
            'email' => $this->email,
            'text'  => $this->text
        ];
        return $this->view('site.email',['data'=>$data])
            ->subject(config('name') . ' - NEW EMAIL');
    }
}
