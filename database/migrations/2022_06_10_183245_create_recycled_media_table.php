<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecycledMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('recycled_media')) {
            Schema::create('recycled_media', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("media_id");
                $table->foreign("media_id")->references("id")->on("media")->onDelete("cascade");
                $table->date("expiry_date");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recycled_media');
    }
}
