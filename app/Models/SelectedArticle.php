<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedArticle extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'selected_articles';

    // Mass assignable attributes
    protected $fillable = ['article_id'];

    /**
     * Get the article that is selected for the slider.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
