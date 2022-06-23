<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Domains\Course\Models\UserCourse;
use Illuminate\Queue\SerializesModels;

class PaymentMade extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public UserCourse $user, public string $url)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.payment-made', [
                'user' => $this->user,
                'url' => $this->url,
            ]);
    }
}
