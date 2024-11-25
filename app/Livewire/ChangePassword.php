<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChangePassword extends Component
{
    use LivewireAlert;

    public $oldPassword;
    public $password;
    public $confirmPassword;

    public function changePassword()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            $this->alert('error', 'Bạn cần đăng nhập để thay đổi mật khẩu!');
            return;
        }

        // Kiểm tra mật khẩu cũ
        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $this->oldPassword])) {
            $this->alert('error', 'Mật khẩu cũ không đúng!');
            return;
        }

        // Kiểm tra xem mật khẩu mới có khớp với mật khẩu xác nhận không
        if ($this->password !== $this->confirmPassword) {
            $this->alert('error', 'Mật khẩu mới và xác nhận mật khẩu không khớp!');
            return;
        }

        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $user->password = bcrypt($this->password);
        $user->save();

        $this->alert('success', 'Đã đổi mật khẩu thành công!');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}