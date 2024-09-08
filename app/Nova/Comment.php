<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Comment extends Resource
{
    public static $model = \App\Models\Comment::class;

    public static $title = 'id';

    public static $search = [
        'id', 'body'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('User', 'user', User::class)
                ->sortable()
                ->searchable(),

            BelongsTo::make('Article', 'article', Article::class)
                ->sortable()
                ->searchable(),

            Text::make('Body')
                ->sortable()
                ->rules('required', 'max:500'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
