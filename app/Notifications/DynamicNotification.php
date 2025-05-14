<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\InquiryEmail;

class DynamicNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $notificationData;

    public function __construct(array $notificationData)
    {
        $this->notificationData = $notificationData;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return $this->notificationData;
    }

    public function toMail($notifiable)
    {
        try {
            switch ($this->notificationData['type']) {
                case 'inquiry':
                    $email = $this->buildInquiryEmail();
                    return $email->to(env('MAIL_FROM_ADDRESS')); 
                default:
                    return null;
            }
        } catch (\Exception $e) {
            \Log::error("Mail send error: " . $e->getMessage());
            return null;
        }
    }
    
    protected function buildInquiryEmail()
    {
        $message = $this->notificationData['message'];
        $subject = $this->notificationData['subject'];
        $senderEmail = $this->notificationData['email'];

        return new InquiryEmail($message, $subject, $senderEmail);
    }
}
