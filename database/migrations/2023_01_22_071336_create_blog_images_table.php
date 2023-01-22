<?php

use App\Models\BlogPost;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create('blog_post_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('filename');
            $table->foreignIdFor(BlogPost::class)->constrained('blog_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists('blog_post_images');
    }
};
