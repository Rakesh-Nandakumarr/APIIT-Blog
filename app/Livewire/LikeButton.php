<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class LikeButton extends Component
{
    public Post $post;

    public int $like_count = 0;


    public function mount(){
        $this->like_count = $this->post->likes()->count();
    }

    public function setLike()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post);
        }else{
            $user->likes()->attach($this->post);
        }

        $this->like_count = (new Post())->find($this->post->id)->likes()->count();

        return redirect($this->post->slug);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
