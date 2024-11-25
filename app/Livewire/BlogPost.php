<?php

namespace App\Livewire;

use App\Models\Blog; // Model cho bài viết
use Livewire\Component;

class BlogPost extends Component
{
    public $slug; // Thêm thuộc tính slug
    public $post; // Thêm thuộc tính để lưu bài viết
    public $previousPost; // Bài viết trước
    public $nextPost; // Bài viết tiếp theo

    public function mount($slug)
    {
        $this->slug = $slug; // Lưu slug vào thuộc tính
        $this->post = Blog::where('slug', $slug)->firstOrFail(); // Lấy bài viết dựa trên slug

        // Lấy bài viết trước và bài viết tiếp theo
        $this->previousPost = Blog::where('id', '<', $this->post->id)->orderBy('id', 'desc')->first();
        $this->nextPost = Blog::where('id', '>', $this->post->id)->orderBy('id')->first();
    }

    public function render()
    {
        return view('livewire.blog-post', [
            'post' => $this->post,
            'previousPost' => $this->previousPost,
            'nextPost' => $this->nextPost,
        ]);
    }
}