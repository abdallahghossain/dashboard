<?php

namespace App\Mail;

use App\Models\complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    private complaint $student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(complaint $student)
    {
        //
        $this->student = $student;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Student Welcome Email',
            from: 'admins@admin.com',
            cc: 'super@admin.com',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'students.student_welcome_email',
            with: [
                'name'=>$this->student->name,
                'email' => $this->student->email,
                'id' => $this->student->id,
                'response'=>$this->student->response,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
