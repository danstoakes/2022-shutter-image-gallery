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
                $table->string('caption')->after('order_column')->nullable();
                $table->string('acc_alternative')->after('caption')->nullable();
                $table->json('exif_data')->after('acc_alternative')->nullable();
                $table->boolean('is_hidden')->after('exif_data')->default(0);
                $table->boolean('is_favourite')->after('is_hidden')->default(0);
                $table->boolean('is_album_cover')->after('is_favourite')->default(0);
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
        if (Schema::hasColumn('media', 'caption', 'acc_alternative', 'exif_data', 'is_hidden', 'is_album_cover')) {
            Schema::table('media', function (Blueprint $table)
            {
                $table->dropColumn('caption');
                $table->dropColumn('acc_alternative');
                $table->dropColumn('exif_data');
                $table->dropColumn('is_hidden');
                $table->dropColumn('is_album_cover');
            });
        }
    }
}
