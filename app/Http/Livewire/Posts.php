<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\Post;


class Posts extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

            
    public function storee()
    {
        $this->validate();
    
        session()->flash('message', 'Post created successfully');
        
        $this->title = '';
        $this->body = '';
    }
 

    public function render()
    {
       
        return view('livewire.posts');
    }
}

