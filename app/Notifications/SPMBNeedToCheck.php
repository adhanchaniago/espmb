<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SPMBNeedToCheck extends Notification implements ShouldQueue
{
    use Queueable;

    public $spmb;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($spmb)
    {
        $this->spmb = $spmb;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('e-SPMB NOTIFICATION - ' . $this->spmb->spmb_no . ' need to be check')
                    ->line('SPMB ' . $this->spmb->spmb_no . ' need to be check. Please click the button below to check the SPMB.')
                    ->action('Check SPMB', url('/spmb/approve/' . $this->spmb->flow_no . '/' . $this->spmb->spmb_id))
                    ->line('If you have question or need help, please call Administrator. ')
                    ->line('Thank you.');
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
            'spmb' => $this->spmb,
            'url' => url('/spmb/approve/' . $this->spmb->flow_no . '/' . $this->spmb->spmb_id),
            'text' => $this->spmb->spmb_no . ' need to be check'
        ];
    }
}
