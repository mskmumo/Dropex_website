<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class TaskReminder extends Notification
{
    use Queueable;

    public function __construct(public $task)
    {
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // You can add 'broadcast' if you want real-time notifications
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Task Reminder: ' . $this->task->title)
            ->line('This is a reminder for your task: ' . $this->task->title)
            ->line('Due Date: ' . $this->task->due_date)
            ->action('View Task', url(route('tasks.index')))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
            'due_date' => $this->task->due_date,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'task' => $this->task,
        ]);
    }
} 