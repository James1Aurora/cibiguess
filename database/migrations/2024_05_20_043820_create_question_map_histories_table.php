<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionMapHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_map_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionId')->constrained('questions')->onDelete('cascade');
            $table->foreignId('historyId')->constrained('histories')->onDelete('cascade');
            $table->string('spotImage');
            $table->decimal('answerX', 8, 2);
            $table->decimal('answerY', 8, 2);
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_map_histories');
    }
}