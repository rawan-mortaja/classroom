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
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class NewClassworkNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected classwork $classwork)
    {
        $this->onQueue('notifications');
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
            FcmChannel::class,
            // 'broadcast',
            // 'mail',
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

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData(['data1' => 'value', 'data2' => 'value2'])
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle('Account Activated')
                ->setBody('Your account has been activated.')
                ->setImage('http://example.com/url-to-image-here.png'))
            ->setAndroid(
                ApnsConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()->setColor('#0A0A0A'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios'))
            );
    }
}
