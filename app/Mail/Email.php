<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($EmailArray)
    {
        $this->name = $EmailArray['name'];
        $this->surname = $EmailArray['surname'];
        $this->email = $EmailArray['email'];
        $this->num = $EmailArray['num'];
        $this->country = $EmailArray['country'];
        $this->msg = $EmailArray['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'User message from the site climbing.ge';
        
        return $this->view('email.email')->with([
            'name'=>$this->name,
            'surname'=>$this->surname,
            'email'=>$this->email,
            'num'=>$this->num,
            'country'=>$this->country,
            'msg'=>$this->msg,
        ])->subject($subject);
        // return $this->view('view.name');
    }
}
