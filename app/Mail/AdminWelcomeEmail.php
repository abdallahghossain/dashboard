<?php

namespace App\Mail;

use App\Models\admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    private admin $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(admin $admin)
    {
        //
        $this->admin = $admin;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Admin Welcome Email',
            from: 'boss@admin.com',
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
            markdown: 'admins.admin_welcome_email',
            with: [
                'name'=>$this->admin->name,
                'password' => $this->admin->password,
                'email' => $this->admin->email
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
