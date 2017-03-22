<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbDetailReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb_detail_receipts')) {
            Schema::create('spmb_detail_receipts', function (Blueprint $table) {
                $table->increments('spmb_detail_receipt_id');
                $table->integer('spmb_detail_id');
                $table->string('spmb_detail_receipt_no')->nullable();
                $table->string('spmb_detail_receipt_name');
                $table->dateTime('spmb_detail_receipt_date');
                $table->text('spmb_detail_receipt_note')->nullable();
                $table->enum('active', ['0', '1'])->default('1');
                $table->integer('created_by');
                $table->integer('updated_by')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spmb_detail_receipts');
    }
}
