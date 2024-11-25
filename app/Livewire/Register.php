<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;


class Register extends Component
{
    use LivewireAlert; // Thêm trait LivewireAlert

    public $name;
    public $phone;
    public $email;
    public $password;
    public function redirectToProvider()
    {
       
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        dd($this->email);
        // try {
        //     $user = Socialite::driver('google')->user();
        //     $findUser = User::where('email', $user->email)->first();
        //     if ($findUser) {
        //         // Đăng nhập người dùng nếu email được tìm thấy trong cơ sở dữ liệu
        //         Auth::login($findUser);
        //         return redirect('/');
        //     } else {
        //         // Tạo người dùng mới nếu email không được tìm thấy
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'password' => Hash::make(uniqid()), // Tạo mật khẩu ngẫu nhiên
        //         ]);

        //         // Đăng nhập người dùng mới
        //         Auth::login($newUser);

        //         // Hiện thông báo thành công
        //         $this->alert('success', 'Đăng ký thành công với Google!', [
        //             'timer' => 3000,
        //             'toast' => true,
        //         ]);

        //         return redirect('/');
        //     }
        // } catch (\Exception $e) {
        //     // Hiển thị thông báo lỗi nếu có sự cố
        //     $this->alert('error', 'Đã có lỗi xảy ra hoặc bạn đã từ chối quyền truy cập ứng dụng.', [
        //         'timer' => 3000,
        //         'toast' => true,
        //     ]);

        //     return redirect('/'); // Quay về trang chính
        // }
    }
    public function register()
    {
        // Kiểm tra xem email đã tồn tại chưa
        if (User::where('email', $this->email)->exists()) {
            $this->alert('error', 'Email đã tồn tại!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        // Kiểm tra các trường bắt buộc khác
        if (empty($this->name) || empty($this->phone) || empty($this->password)) {
            $this->alert('error', 'Vui lòng điền đầy đủ thông tin!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        try {
            // Tạo người dùng mới
            User::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Hiện thông báo thành công
            $this->alert('success', 'Đăng ký thành công!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);

            // Chuyển hướng đến trang đăng nhập
            return redirect()->to('/account/login');
        } catch (\Exception $e) {
            // Hiện thông báo lỗi
            $this->alert('error', 'Đăng ký không thành công! Vui lòng thử lại.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}
