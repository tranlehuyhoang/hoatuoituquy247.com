<?php

namespace App\Livewire;

use App\Mail\Contact as ContactMail;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Carbon\Carbon;

class Contact extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $phone;
    public $body;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'body' => 'required|string',
    ];

    public $lastSentAt; // Thêm biến để lưu thời gian gửi cuối

    public function submit()
    {
        // Kiểm tra xem có được gửi không
        if ($this->lastSentAt && Carbon::now()->diffInMinutes($this->lastSentAt) < 5) {
            $this->alert('error', 'Bạn phải đợi 5 phút trước khi gửi tin nhắn tiếp theo.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        $this->validate();

        // Gửi email
        $settings = \App\Models\Setting::first();
        $recipientEmail = $settings->email; // Địa chỉ email nhận
    
        // Gửi email
        Mail::to($recipientEmail)->send(new ContactMail([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'body' => $this->body,
        ]));
    

        // Cập nhật thời gian gửi
        $this->lastSentAt = Carbon::now();

        // Hiển thị thông báo
        $this->alert('success', 'Tin nhắn đã được gửi thành công!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        // Reset các trường
        $this->reset(['name', 'email', 'phone', 'body']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
