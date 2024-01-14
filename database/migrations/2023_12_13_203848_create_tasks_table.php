<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('diary_id')->nullable();
            $table->string('name',30);
            $table->integer('importance_urgency');
            $table->integer('target_time');
            $table->integer('elapsed_time')->nullable();
            $table->text('detail')->nullable();
            $table->text('purpose')->nullable();
            $table->text('good_future')->nullable();
            $table->text('bad_future')->nullable();
            $table->text('reward')->nullable();
            $table->string('image_url')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tasks');
    }
};
