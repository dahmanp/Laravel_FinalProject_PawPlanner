<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class TaskAlert extends Mailable
{
    use Queueable, SerializesModels;

    public Task $task;
    public string $type;

    public function __construct(Task $task, string $type = 'first')
    {
        $this->task = $task;
        $this->type = $type;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Task Alert: ' . $this->task->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.taskalert',
            with: [
                'task' => $this->task,
                'type' => $this->type,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
