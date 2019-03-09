<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTalksAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('talks', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->unsignedInteger('event_id')->nullable()->change();
//            $table->unsignedInteger('photo_id')->nullable()->change();
//            $table->unsignedInteger('video_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('set null');
//            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('set null');
//            $table->foreign('video_id')->references('id')->on('videos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('talks_user_id_foreign');
        $table->dropForeign('talks_event_id_foreign');
//        $table->dropForeign('talks_photo_id_foreign');
//        $table->dropForeign('talks_video_id_foreign');
    }
}
