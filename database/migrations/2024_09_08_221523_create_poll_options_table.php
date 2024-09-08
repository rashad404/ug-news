<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('poll_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained()->onDelete('cascade'); // Reference to polls
            $table->string('option');
            $table->unsignedBigInteger('votes')->default(0); // Track the number of votes for each option
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poll_options');
    }
}
