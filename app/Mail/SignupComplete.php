<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \App\Models\Course;

class SignupComplete extends Mailable
{
    use Queueable, SerializesModels;
    public $validate;
    // public $course;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validate)
    {
        $this->validate = $validate;
        // $this->course = Course::find($this->validate->course)->pluck('name')->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Bedankt voor uw inschrijving '.$this->validate->name)
        ->view('mails.signupcomplete');
    }
}