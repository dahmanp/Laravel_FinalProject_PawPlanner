<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAlert;
use Carbon\Carbon;

class SendReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send scheduled task reminders';

    public function handle(): int
    {
        $now = now();
        $day = strtolower($now->format('l'));
        $tasks = Task::where($day, true)->get();

        foreach ($tasks as $task) {
            $taskTime = $task->notification_time
                ? Carbon::createFromFormat('H:i', $task->notification_time)
                : null;

            $secondTaskTime = $task->second_notification_time
                ? Carbon::createFromFormat('H:i', $task->second_notification_time)
                : null;

            if ($taskTime && $taskTime->format('H:i') === $now->format('H:i') && (!$task->last_sent_at || Carbon::parse($task->last_sent_at)->isToday() === false))
            {
                Mail::to($task->user->email)
                    ->send(new TaskAlert($task, 'first'));

                $task->update([
                    'last_sent_at' => $now
                ]);
            }

            if ($task->multiple_notifs && $secondTaskTime && $secondTaskTime->format('H:i') === $now->format('H:i') && (!$task->second_last_sent_at || Carbon::parse($task->second_last_sent_at)->isToday() === false))
            {
                Mail::to($task->user->email)
                    ->send(new TaskAlert($task, 'second'));

                $task->update([
                    'second_last_sent_at' => $now
                ]);
            }
        }

        return self::SUCCESS;
    }
}
