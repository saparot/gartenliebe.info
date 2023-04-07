<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private const TABLE = 'static_page_contents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up () {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('identifier')->unique();
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down () {
        Schema::dropIfExists(self::TABLE);
    }
};
