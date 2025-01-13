<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\BlogStore;

class BlogDetails extends Component
{
    public $blogstore;

    public function __construct($blog)
    {
        $this->blogstore = $blog;
    }

    public function render()
    {
        return view('components.blog-details');
    }
}
