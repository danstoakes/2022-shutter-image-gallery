<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlbumIdToMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('media')) {
            Schema::table('media', function (Blueprint $table) {
                $table->unsignedBigInteger('album_id')->nullable();
                $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('media', 'album_id')) {
            Schema::table('media', function (Blueprint $table)
            {
                $table->dropForeign('media_album_id_foreign');
                $table->dropColumn('album_id');
            });
        }
    }
}
