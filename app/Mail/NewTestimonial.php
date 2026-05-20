<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTestimonial extends Mailable
{
    use Queueable, SerializesModels;

    public $testimonial;

    public function __construct($testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('تقييم جديد يحتاج موافقتك - ' . env('APP_NAME'))
            ->view('emails.new-testimonial');
    }
}
