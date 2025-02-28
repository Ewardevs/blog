<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class PostIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        return $this->resetPage();
    }
    public function render()
    {

        $posts = Post::where('user_id', auth()->user()->id)
            ->where('name','LIKE','%'.$this->search.'%')
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.post-index',compact('posts'));
    }
}
