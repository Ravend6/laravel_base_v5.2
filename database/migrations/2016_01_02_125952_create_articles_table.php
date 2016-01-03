<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('body');
            $table->boolean('is_visible')->default(0);
            $table->boolean('is_sticky')->default(0);
            $table->boolean('is_closed')->default(0);
            $table->timestamp('created_at')->default(0);
            $table->timestamp('updated_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
