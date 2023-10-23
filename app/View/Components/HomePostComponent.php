<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomePostComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $viewData = array(
            'post' => $this->post
        );
        $componentView = $this->post->order % 2 == 1 ? 'components.home-post-component' : 'components.home-post-dark-component';
        return view($componentView, $viewData);
    }
}
