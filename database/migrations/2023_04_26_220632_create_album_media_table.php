<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('album_media')) {
            Schema::create('album_media', function (Blueprint $table) {
                $table->unsignedBigInteger("album_id");
                $table->foreign("album_id")->references("id")->on("album")->onDelete("cascade");
                $table->unsignedBigInteger("media_id");
                $table->foreign("media_id")->references("id")->on("media")->onDelete("cascade");
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
        Schema::dropIfExists('album_media');
    }
}
