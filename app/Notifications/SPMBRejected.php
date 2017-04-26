<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SPMBRejected extends Notification implements ShouldQueue
{
    use Queueable;

    public $spmb;
    public $spmbdetail;
    public $ruless;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($spmb)
    {
        $this->spmb = $spmb;
        foreach ($this->spmb->spmbdetails as $key => $value) {
            $this->spmbdetail .= $value->spmb_detail_item_name . ' (' . $value->spmb_detail_qty . ' ' . $value->unit->unit_code . ' ) , ';
        }

        foreach($this->spmb->spmbtype->rules as $key => $value) {
            $bool = false;
            foreach($this->spmb->rules as $k => $v) {
                if($v->rule_id == $value->rule_id) {
                    $bool = true;
                }
            }

            if(!$bool) {
                $this->ruless .= $value->rule_name . ' (Not Available) , ';
            }else{
                $this->ruless .= $value->rule_name . ' (OK) , ';
            }
        }

        foreach($this->spmb->spmbhistories as $key => $value) {
            if($value->flow_no==1 && $value->approval_type_id==5) {
                $this->message = $value->spmb_history_desc;
            }
        }
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
                    ->subject('e-SPMB NOTIFICATION - ' . $this->spmb->spmb_no . ' has been rejected')
                    ->line('SPMB ' . $this->spmb->spmb_no . ' has been rejected.')
                    ->line('Below are the details of SPMB:')
                    ->line('-------------------------------------------')
                    ->line('SPMB No : ' . $this->spmb->spmb_no)
                    ->line('No PR SAP : ' . $this->spmb->spmb_no_pr_sap)
                    ->line('Cost Center : ' . $this->spmb->spmb_cost_center)
                    ->line('No I/O DIPK : ' . $this->spmb->spmb_io_no)
                    ->line('Request By : ' . $this->spmb->spmb_applicant_name)
                    ->line('Items : ' . $this->spmbdetail)
                    ->line('-------------------------------------------')
                    ->line('The reason of rejected SPMB listed here:')
                    ->line($this->ruless)
                    ->line('')
                    ->line($this->message)
                    ->line('Please complete the attachment of SPMB to continue the process.')
                    ->line('')
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
            //
        ];
    }
}
