<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ArticleCard extends Component
{
    public $article;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.article-card');
    }
}
