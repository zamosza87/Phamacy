<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistory1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_history', function (Blueprint $table) {
            $table->string('congenital_disease')->nullable();
            $table->string('drug_allergies')->nullable();
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
            $table->dropColumn('congenital_disease');
            $table->dropColumn('drug_allergies');
        });
    }
}
