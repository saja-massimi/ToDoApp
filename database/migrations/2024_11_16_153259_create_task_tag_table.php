<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_tag', function (Blueprint $table) {

            //create id
            $table->id('task_tag_id');

            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('task_id')
                ->references('task_id')
                ->on('tasks');

            $table->foreign('tag_id')->references('tag_id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_tag');
    }
};
