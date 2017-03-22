<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb_details')) {
            Schema::create('spmb_details', function (Blueprint $table) {
                $table->increments('spmb_detail_id');
                $table->integer('spmb_id');
                $table->string('spmb_detail_account_no');
                $table->integer('spmb_detail_sequence_no');
                $table->integer('item_category_id');
                $table->string('spmb_detail_item_name');
                $table->integer('unit_id');
                $table->integer('spmb_detail_qty');
                $table->double('spmb_detail_item_price')->nullable();
                $table->integer('spmb_detail_status')->nullable();
                $table->string('spmb_detail_asset_no')->nullable();
                $table->text('spmb_detail_note')->nullable();
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
        Schema::dropIfExists('spmb_details');
    }
}
