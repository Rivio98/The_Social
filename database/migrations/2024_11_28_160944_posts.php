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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('content_post');
            $table->enum('type_post', ['image', 'video', 'none'])->default('none');
            $table->string('media_url')->nullable();
            $table->enum('visibility_post', ['all', 'for', 'block'])->default('all');
            $table->integer('likes_counter')->default(0);
            $table->integer('shares_counter')->default(0);
            $table->integer('comments_counter')->default(0);
            $table->enum('moderation_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('moderation_reason')->default(NULL);
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
        //
    }
};
