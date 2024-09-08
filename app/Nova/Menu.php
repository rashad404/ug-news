<?php
namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\Category;

class Menu extends Resource
{
    public static $model = \App\Models\Menu::class;

    public static $title = 'name';

    public static $search = ['id', 'name'];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Description')
                ->rules('nullable'),

            Select::make('Path')
                ->options(function () {
                    $categories = Category::all()->pluck('name', 'id')->toArray();
                    return array_merge(['' => 'Select Category'], $categories, ['custom' => 'Custom URL']);
                })
                ->displayUsingLabels(),

            Text::make('Custom URL', 'path')
                ->rules('nullable', 'url')
                ->hideFromIndex(),

            BelongsTo::make('Category')
                ->nullable(),

            BelongsTo::make('Parent', 'parent', Menu::class)
                ->nullable(),

            HasMany::make('Submenus', 'children', Menu::class),

            Number::make('Order')
                ->rules('required', 'integer')
                ->sortable(),
        ];
    }
}
