<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEventPhotosAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_photos', function (Blueprint $table) {
            $table->unsignedInteger('event_id')->nullable()->change();
            $table->unsignedInteger('photo_id')->nullable()->change();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('event_photos_event_id_foreign');
        $table->dropForeign('event_photos_photo_id_foreign');
    }
}
