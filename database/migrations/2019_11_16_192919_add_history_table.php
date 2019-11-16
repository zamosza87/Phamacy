<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_history', function (Blueprint $table) {
            $table->string('type_')->default('พบแพทย์')->nullable();
            $table->string('note')->nullable()->change();
            $table->string('diagnose')->nullable()->change();
            $table->string('treatment')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_history', function (Blueprint $table) {
            $table->dropColumn('type_');
        });
    }
}
