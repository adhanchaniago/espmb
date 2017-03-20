<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVendorRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('vendor_ratings')) {
            Schema::table('vendor_ratings', function($table) {
                DB::statement('DROP TABLE vendor_ratings');

                Schema::create('vendor_rating', function (Blueprint $table) {
                    $table->integer('vendor_id');
                    $table->integer('rating_id');
                });
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
        //
    }
}
