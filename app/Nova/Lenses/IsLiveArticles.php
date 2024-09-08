<?php
namespace App\Nova\Lenses;

use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Lenses\Lens;

class IsLiveArticles extends Lens
{
    /**
     * Get the fields displayed by the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable(),

            Boolean::make('Featured'),

            Boolean::make('Is Live'),

            DateTime::make('Published At'),

            BelongsTo::make('Author', 'user', \App\Nova\User::class),

            BelongsTo::make('Category', 'category', \App\Nova\Category::class),
        ];
    }

    /**
     * Get the query builder for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function query(LensRequest $request, $query)
    {
        return $query->where('is_live', true); // Filter to show only "is live" articles
    }

    /**
     * Get the name of the lens.
     *
     * @return string
     */
    public function name()
    {
        return 'Is Live Articles';
    }
}
