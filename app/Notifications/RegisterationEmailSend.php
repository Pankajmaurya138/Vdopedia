<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
class RegisterationEmailSend extends Notification
{
    use Queueable;
  protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        $userInfo =User::where('email',$this->user->email)->first();
        $sendEmail = new MailMessage;
        $sendEmail->subject('Thank you for registering with VDOpedia.');
        $sendEmail->from('info@vdopedia.com');
        $sendEmail->bcc('pankajmaurya138@gmail.com');
        $sendEmail->line('Dear'.' '.$this->user->name.'');
        $sendEmail->line('We welcome you to our platform VDOPedia. You can share your old and new videos to start earning revenue. Your followers can download lyrics/mp3/podcast of your creativity.');
        $sendEmail->line('Please allow us 4 hours to verify your details and activate your profile. We will inform you via EMail once it will get activated. In the meantime please relax and enjoy other’s videos. Keep sharing with your friends.');


        return $sendEmail;
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
