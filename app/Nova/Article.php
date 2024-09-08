<?php
namespace App\Nova;

use App\Nova\Lenses\FeaturedArticles;
use App\Nova\Lenses\IsLiveArticles;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Article extends Resource
{
    public static $model = \App\Models\Article::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'slug'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Category'),

            BelongsTo::make('Author', 'user', User::class)
                ->sortable()
                ->searchable(),

            Boolean::make('Published'),

            DateTime::make('Published At'),

            Boolean::make('Featured')
                ->trueValue('1')
                ->falseValue('0'),

            Boolean::make('Is Live')
                ->trueValue('1')
                ->falseValue('0'),

            Number::make('Shared Count')
                ->min(0)
                ->sortable(),

            HasMany::make('Comments'),
        ];
    }

    public function lenses(Request $request)
    {
        return [
            new FeaturedArticles,
            new IsLiveArticles,
        ];
    }
}
