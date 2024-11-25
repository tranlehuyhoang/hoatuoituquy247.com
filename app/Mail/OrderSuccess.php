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
    public $orderItems; // Danh sách sản phẩm
    public $shippingAddress; // Địa chỉ giao hàng
    public $orderCode; // Địa chỉ giao hàng
    /**
     * Create a new message instance.
     */
    public function __construct($order, $orderItems, $shippingAddress, $orderCode)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->shippingAddress = $shippingAddress;
        $this->orderCode = $orderCode;
        $this->from('hoangtlhps26819@fpt.edu.vn', 'THEBABUSTORE.VN');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông tin đơn hàng:  ' . $this->orderCode, // Sửa tiêu đề email
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
                'orderItems' => $this->orderItems,
                'shippingAddress' => $this->shippingAddress,
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
