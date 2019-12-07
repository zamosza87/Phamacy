<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistorydTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_detail_history', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('tbl_history', function (Blueprint $table) {
            $table->unsignedBigInteger('id_doc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_detail_history', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
