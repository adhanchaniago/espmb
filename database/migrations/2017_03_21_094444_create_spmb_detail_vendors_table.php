<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbDetailVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb_detail_vendors')) {
            Schema::create('spmb_detail_vendors', function (Blueprint $table) {
                $table->increments('spmb_detail_vendor_id');
                $table->integer('spmb_detail_id');
                $table->integer('vendor_id');
                $table->double('spmb_detail_vendor_offer_price');
                $table->double('spmb_detail_vendor_deal_price');
                $table->integer('spmb_detail_vendor_status');
                $table->text('spmb_detail_vendor_note')->nullable();
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
        Schema::dropIfExists('spmb_detail_vendors');
    }
}
