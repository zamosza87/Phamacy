<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhamacyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phamacy', function (Blueprint $table) {
            $table->bigIncrements('pha_id');
            $table->string('thai_name') ->comment('ชื่อไทย');;
            $table->string('generic_name')->comment('ชื่อสามัญทางยา');;
            $table->string('trade_name')->comment('ชื่อทางการค้า');;
            $table->string('company_Name')->comment('ชื่อบริษัท');;
            $table->string('drug_type')->comment('ชนิดยา');;
            $table->string('package')->comment('บรรจุภัณฑ์');;
            $table->string('amount')->comment('ปริมาณ');;
            $table->string('properties')->comment('สรรพคุณ');;
            $table->date('expiry_date')->comment('วันที่หมดอายุ');;
            $table->integer('stock')->comment('คงคลัง');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_phamacy');
    }
}
