<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class SelectedArticle extends Resource
{
    public static $model = \App\Models\SelectedArticle::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            // Use the Nova Article Resource
            BelongsTo::make('Article', 'article', Article::class)->sortable()->searchable(),
        ];
    }
}
