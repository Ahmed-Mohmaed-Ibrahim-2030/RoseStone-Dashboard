<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateCourse extends Notification
{
    use Queueable;

    private $course_id;
    private $created_by;
    private $name;

    public function __construct($course_id,$created_by,$name)
    {
        $this->course_id = $course_id;
        $this->created_by = $created_by;
        $this->name = $name;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

        public function toArray($notifiable)
    {
        return [
            'course_id'=> $this->course_id,
            '$created_by'=>$this->created_by,
            '$name'=>$this->name
        ];
    }
}
