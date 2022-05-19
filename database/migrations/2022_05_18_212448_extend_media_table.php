<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendMediaTable extends Migration
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
                $table->unsignedBigInteger('user_id')->after('order_column');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('caption')->after('user_id')->nullable();
                $table->string('acc_alternative')->after('caption')->nullable();
                $table->json('exif_data')->after('acc_alternative')->nullable();
                $table->boolean('is_hidden')->after('exif_data');
                $table->boolean('is_favourite')->after('is_hidden');
                $table->boolean('is_album_cover')->after('is_favourite');
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
        if (Schema::hasColumn('media', 'user_id', 'caption', 'acc_alternative', 'exif_data', 'is_hidden', 'is_album_cover')) {
            Schema::table('media', function (Blueprint $table)
            {
                $table->dropForeign('media_user_id_foreign');
                $table->dropColumn('user_id');
                $table->dropColumn('caption');
                $table->dropColumn('acc_alternative');
                $table->dropColumn('exif_data');
                $table->dropColumn('is_hidden');
                $table->dropColumn('is_album_cover');
            });
        }
    }
}
