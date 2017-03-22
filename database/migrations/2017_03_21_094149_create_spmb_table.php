<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb')) {
            Schema::create('spmb', function (Blueprint $table) {
                $table->increments('spmb_id');
                $table->integer('spmb_type_id');
                $table->char('spmb_no','18'); //SPMB-NOV1710020001
                $table->char('spmb_no_pr_sap','10');
                $table->string('spmb_group');
                $table->integer('division_id');
                $table->string('spmb_cost_center');
                $table->string('spmb_io_no');
                $table->string('spmb_buyer_no');
                $table->string('spmb_applicant_name');
                $table->string('spmb_applicant_email');
                $table->dateTime('spmb_finish_date')->nullable();
                $table->integer('flow_no');
                $table->integer('current_user');
                $table->integer('pic')->nullable();
                $table->enum('spmb_method', ['NORMAL', 'ABNORMAL'])->default('NORMAL');
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
        Schema::dropIfExists('spmb');
    }
}
