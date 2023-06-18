<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SmtpTest extends TestCase
{
    public function testEmailSending()
    {
        // Set up any necessary data for the email
        $data = [
            'recipient' => 'voci.dev@gmail.com',
            'subject' => 'Test Email',
            'message' => 'This is a test email.',
        ];

        // Send the email
        Mail::raw($data['message'], function ($message) use ($data) {
            $message->to($data['recipient'])
                    ->subject($data['subject']);
        });

        // Assert that the email was sent successfully
        $this->assertTrue(Mail::failures()->isEmpty(), 'Failed to send email.');
    }
}
