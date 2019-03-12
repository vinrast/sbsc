<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyHistoryIndicators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_indicators', function (Blueprint $table) {
            $table->foreign('indicator_id')->references('id')->on('history_indicators');
        });
    }

    public function down()
    {
        Schema::table('history_indicators', function (Blueprint $table) {
            $table->dropForeign(['indicator_id']);
        });
    }
}
