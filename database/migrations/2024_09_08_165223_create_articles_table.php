<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Author of the article
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Category of the article
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->string('image')->nullable()->default('default_images/article.jpg');
            $table->json('tags')->nullable(); // Storing tags as JSON
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(false);
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('is_live')->default(false);
            $table->unsignedBigInteger('shared_count')->default(0);
     
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
