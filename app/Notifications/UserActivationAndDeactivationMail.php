<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserActivationAndDeactivationMail extends Notification
{
    use Queueable;
    public $user;

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
        $path = asset('email_video/vdopedia_email_content.mp4');
        if($this->user->status == 'active') {
            $sendEmail = new MailMessage;
            $sendEmail->subject('Account Activation Mail');
            $sendEmail->from('vdopedia.marketing@gmail.com');
            $sendEmail->cc('pankajmaurya138@gmail.com');
            $sendEmail->bcc($this->user->email);
            $sendEmail->line('Dear'.' '.$this->user->name.''.',');
            $sendEmail->line('Welcome to the family of VDOPedia a Video Sharing platform. Your Account is activated now.');
            $sendEmail->line('Please use below creadentail to login:');
            // $sendEmail->line('Email ID :'.$this->user->email);
            // $sendEmail->line('Password:'.'Test@123(Please change your password after login).');
            $sendEmail->line('Start uploading your video to earn more revenue. It works on More Views More Money (MVMM). Please start uploading your content and share with your friends & families to earn revenue. Viewers can donwload MP3 of your videos.');
            $sendEmail->line('For any further query please send an email to info@vdopedia.com.');
            $sendEmail->attach( $path, array(
                'as' => 'vdopeda.mp4', 
                'mime' => 'video/mp4')
    );
        }elseif($this->user->status == 'inactive'){
            $sendEmail = new MailMessage;
            $sendEmail->subject('Account DeActivation Mail.');
            $sendEmail->from('vdopedia.marketing@gmail.com');
            $sendEmail->cc('pankajmaurya138@gmail.com');
            $sendEmail->bcc($this->user->email);
            $sendEmail->line('Dear'.' '.$this->user->name.''.',');
            $sendEmail->line('Your Account is Deactivated due to policy voilation.');
            $sendEmail->line('If you think it happens due to some mistake, please let us know by replying to info@vdopedia.com. Our VDOPedia Support team will review your account and will get back to you.');
        }
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
