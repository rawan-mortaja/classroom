<?php

namespace App\Notifications;

use App\Broadcasting\HadaraSmsChannel;
use App\Models\classwork;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Facades\Vonage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class NewClassworkNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected classwork $classwork)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // channels : mail , database , brodcast(pusher) , vonage (sms) , slack

        $via =  [
            'database',
            'broadcast',
            'mail',
            // 'vonage',
            HadaraSmsChannel::class,
        ];
        // $via = ['database'];
        // if($notifiable->receive_mail_notifications){
        //     $via[] = 'mail';
        // }
        // if($notifiable->receive_push_notifications){
        //     $via[] = 'broadcast';
        // }
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $classwork = $this->classwork;
        $content = __(':name posted a new :type : :title', [
            'name' => $classwork->user->name,
            'type' => __($classwork->type->value),
            'title' => $classwork->title,
        ]);

        return (new MailMessage)
            ->subject(__('New :type', [
                'type' => $classwork->type->value,
            ]))
            ->greeting(__('Hi :name', [
                'name' => $notifiable->name,
            ]))
            ->line($content)
            ->action(__('Go to Classwork'), route('classrooms.classworks.show', [$classwork->classroom->id, $classwork->id]))
            ->line('Thank you for using our application!');
        // ->view('');
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {

        return new DatabaseMessage($this->createMessage());
    }


    public function toBroadcast($notifiable): BroadcastMessage
    {

        return new BroadcastMessage($this->createMessage());
    }

    protected function createMessage()
    {
        $classwork = $this->classwork;
        $content = __(':name posted a new :type : :title', [
            'name' => $classwork->user->name,
            'type' => __($classwork->type->value),
            'title' => $classwork->title,
        ]);

        return [
            'title' => __('New :type', [
                'type' => $classwork->type->value,
            ]),
            'body' => $content,
            'image' => '',
            'link' => route('classrooms.classworks.show', [$classwork->classroom->id, $classwork->id]),
            'classwork' => $classwork->id,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
            ->content(__('A new Classwork Created!'));
    }

    public function toHadara(object $notifiable): string
    {
        return (__('A new Classwork Created!'));
    }
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
