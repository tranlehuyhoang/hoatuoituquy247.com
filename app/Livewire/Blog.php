<?php

namespace App\Livewire;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Blog extends Component
{
    use WithPagination;

    public function render()
    {
        // Lấy bài viết mới nhất, 6 bài mỗi trang
        $posts = ModelsBlog::orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.blog', ['posts' => $posts]);
    }
}