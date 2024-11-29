<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $order; // Thông tin đơn hàng
    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->from('hoangtlhps26819@fpt.edu.vn', 'HOATUOITUQUY247.COM');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông tin đơn hàng:  ' . $this->order->order_code, // Sửa tiêu đề email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ordersuccess', // Đảm bảo rằng view này tồn tại
            with: [
                'order' => $this->order,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
