<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Multi-language field for the menu name
            $table->json('description')->nullable(); // Multi-language field for description
            $table->string('path')->nullable(); // Path or URL
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Reference to categories
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade'); // Reference to parent menu for submenus
            $table->integer('order')->default(0); // Menu order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
