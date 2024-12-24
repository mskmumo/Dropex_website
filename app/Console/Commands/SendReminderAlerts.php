<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Notifications\ReminderAlert;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendReminderAlerts extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send reminder alerts for pending payments and overdue deliveries';

    public function handle()
    {
        $orders = Order::where('status', 'Pending')->orWhere('status', 'Overdue')->get();

        foreach ($orders as $order) {
            $message = 'Reminder: Your order with ID ' . $order->id . ' is pending or overdue.';
            Notification::send($order->user, new ReminderAlert($message));
        }

        $this->info('Reminder alerts sent successfully.');
    }
} 