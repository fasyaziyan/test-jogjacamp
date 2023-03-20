<?php

namespace App\Notifications;

use App\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryNotification extends Notification
{
    use Queueable;

    public $category;
    public $action;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Category $category, $action)
    {
        $this->category = $category;
        $this->action = $action;
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
        $url = url('/categories');
        return (new MailMessage)
                    ->line('Category has been '.$this->action)
                    ->action('View Category', $url)
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
            'category_id' => $this->category->id,
            'category_name' => $this->category->name,
            'action' => $this->action,
        ];
    }
}
