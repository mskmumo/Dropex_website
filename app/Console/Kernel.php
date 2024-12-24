<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Task;
use App\Notifications\TaskReminder;
use App\Models\Order;
use App\Models\Auction;
use App\Notifications\AuctionReminder;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * These should be classes that implement the ShouldAutoRun interface.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $tasks = Task::where('due_date', '<=', now()->addDay())->get(); // Get tasks due within the next day

            foreach ($tasks as $task) {
                $task->user->notify(new TaskReminder($task)); // Notify the user
            }
        })->daily(); // Schedule this to run daily

        $schedule->call(function () {
            // Logic to fetch orders and create tasks
            // Example: Assuming you have an Order model
            $orders = Order::where('delivery_date', '<=', now()->addDay())->get();

            foreach ($orders as $order) {
                Task::create([
                    'user_id' => $order->user_id,
                    'title' => 'Follow up on order #' . $order->id,
                    'description' => 'Check the status of order #' . $order->id,
                    'due_date' => $order->delivery_date,
                    'is_completed' => false,
                ]);
            }
        })->daily();

        $schedule->call(function () {
            // Logic to fetch auctions and notify users
            $auctions = Auction::where('end_time', '<=', now()->addDay())->get();

            foreach ($auctions as $auction) {
                $auction->user->notify(new AuctionReminder($auction)); // Assuming you have an AuctionReminder notification
            }
        })->daily();

        $schedule->command('reminders:send')->daily(); // Adjust frequency as needed

        $schedule->command('parcels:update-statuses')->everyFiveMinutes(); // Adjust frequency as needed
    }

    /**
     * Register the commands for your application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
} 