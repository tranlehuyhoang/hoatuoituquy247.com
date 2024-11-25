<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Logout extends Component
{
    use LivewireAlert;

    public function mount()
    {
        // Thực hiện đăng xuất khi component được khởi tạo
        Auth::logout();

        // Hiển thị thông báo đăng xuất thành công
        $this->alert('success', 'Bạn đã đăng xuất thành công!');

        // Chuyển hướng về trang chính hoặc trang đăng nhập
        return redirect()->to('/account/login'); // Hoặc trang bạn muốn chuyển hướng đến
    }

    public function render()
    {
        return view('livewire.logout');
    }
}