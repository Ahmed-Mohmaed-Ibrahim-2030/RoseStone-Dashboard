<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUs extends Notification
{
    use Queueable;
private $contact_id;
private $name;
private $subject;
    public function __construct($contact_id,$name,$subject)
    {
        $this->contact_id = $contact_id;
        $this->name = $name;
        $this->subject = $subject;
    }


    public function via($notifiable)
    {
        return ['database'];
    }




    public function toArray($notifiable)
    {
        return [
         'contact_id'=>$this->contact_id,
            'name'=>$this->name,
            'subject'=>$this->subject,

        ];
    }
}
