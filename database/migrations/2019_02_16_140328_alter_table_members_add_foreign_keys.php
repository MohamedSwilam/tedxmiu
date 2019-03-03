<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMembersAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->unsignedInteger('photo_id')->nullable()->change();
            $table->unsignedInteger('year_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('set null');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('set null');
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
        $table->dropForeign('talks_photo_id_foreign');
        $table->dropForeign('talks_year_id_foreign');
    }
}