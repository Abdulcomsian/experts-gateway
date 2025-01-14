<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $name, $email, $phone, $practice, $message;
    public function __construct($name, $email, $phone, $practice,$message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->practice = $practice;
        $this->message = $message;
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
                    ->subject("New Message from Expert Gateway")
                    ->greeting('Hi Admin!, New message for you')
                    ->line("Name: " . $this->name)
                    ->line("Email: " . $this->email)
                    ->line("Phone: " . $this->phone)
                    ->line("Practice Area: " . $this->practice)
                    ->line("Message: " . $this->message)
                    ->line('Thank you for using our application!');
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
