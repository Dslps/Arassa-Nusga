<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectDetails extends Component
{
    public $projectstore;

    public function __construct($project)
    {
        $this->projectstore = $project;
    }

    public function render()
    {
        return view('components.project-details');
    }
}
