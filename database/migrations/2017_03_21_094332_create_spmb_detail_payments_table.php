<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbDetailPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb_detail_payments')) {
            Schema::create('spmb_detail_payments', function (Blueprint $table) {
                $table->increments('spmb_detail_payment_id');
                $table->integer('spmb_detail_id');
                $table->integer('payment_type_id');
                $table->dateTime('spmb_detail_payment_request_date');
                $table->dateTime('spmb_detail_payment_transfer_date');
                $table->dateTime('spmb_detail_payment_finish_date');
                $table->double('spmb_detail_payment_amount');
                $table->text('spmb_detail_payment_note')->nullable();
                $table->integer('spmb_detail_payment_status');
                $table->string('spmb_detail_payment_request_name');
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
        Schema::dropIfExists('spmb_detail_payments');
    }
}
