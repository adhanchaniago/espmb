<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('spmb_histories')) {
            Schema::create('spmb_histories', function (Blueprint $table) {
                $table->increments('spmb_history_id');
                $table->integer('spmb_id');
                $table->integer('approval_type_id');
                $table->integer('flow_no');
                $table->string('spmb_history_desc')->nullable();
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
        Schema::dropIfExists('spmb_histories');
    }
}
