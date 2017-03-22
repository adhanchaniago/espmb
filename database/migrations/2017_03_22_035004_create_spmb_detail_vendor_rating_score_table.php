<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmbDetailVendorRatingScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spmb_detail_vendor_rating_score', function (Blueprint $table) {
                    $table->integer('spmb_detail_id');
                    $table->integer('vendor_id');
                    $table->integer('rating_id');
                    $table->integer('score');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spmb_detail_vendor_rating_score');
    }
}
