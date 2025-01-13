<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\BlogStore;

class BlogDetails extends Component
{
    public $blogstore;

    /**
     * Принимаем объект блога в конструкторе
     */
    public function __construct($blog)
    {
        $this->blogstore = $blog;
    }

    /**
     * Возвращаем blade-шаблон компонента
     */
    public function render()
    {
        return view('components.blog-details');
    }
}
