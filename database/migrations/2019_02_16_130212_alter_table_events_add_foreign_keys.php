<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEventsAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('year_id')->nullable()->change();
            $table->unsignedInteger('photo_id')->nullable()->change();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('set null');
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
        $table->dropForeign('events_year_id_foreign');
        $table->dropForeign('events_photo_id_foreign');
    }
}
