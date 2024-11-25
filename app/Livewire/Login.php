<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert; // Thêm trait LivewireAlert

    public $email;
    public $password;
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('email', $user->email)->first();

        if ($findUser) {
            // Đăng nhập người dùng nếu email được tìm thấy trong cơ sở dữ liệu
            Auth::login($findUser);
            return redirect('/');
        } else {
            // Tạo người dùng mới nếu email không được tìm thấy
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(uniqid()), // Tạo mật khẩu ngẫu nhiên
            ]);

            // Đăng nhập người dùng mới
            Auth::login($newUser);

            // Hiện thông báo thành công
            $this->alert('success', 'Đăng ký thành công với Google!', [
                'timer' => 3000,
                'toast' => true,
            ]);

            return redirect('/');
        }
    } catch (\Exception $e) {
        // Hiển thị thông báo lỗi nếu có sự cố
        $this->alert('error', 'Đã có lỗi xảy ra hoặc bạn đã từ chối quyền truy cập ứng dụng.', [
            'timer' => 3000,
            'toast' => true,
        ]);

        return redirect('/'); // Quay về trang chính
    }
}
    public function login()
    {
        // Xác thực thông tin đăng nhập
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (auth()->attempt($credentials)) {
            // Đăng nhập thành công
            $this->alert('success', 'Đăng nhập thành công!', [
                
                'timer' => 3000,
                'toast' => true,
            ]);
            return redirect()->to('/account'); // Chuyển hướng đến trang dashboard
        } else {
            // Đăng nhập không thành công
            $this->alert('error', 'Email hoặc mật khẩu không đúng!', [
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}