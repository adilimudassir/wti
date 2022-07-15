<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Domains\Payment\Models\Payment;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentSubmitted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private Payment $payment)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Payment Submitted')
                    ->greeting("Hello {$notifiable->name},")
                    ->line('You have successfully submitted a payment.')
                    ->line('You will be notified when your payment is verified.')
                    ->action('You can further check your payment details here', route('user-courses.show', $this->payment->user_course_id))
                    ->line('Thank you for purchasing this course and securing your financial future!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
