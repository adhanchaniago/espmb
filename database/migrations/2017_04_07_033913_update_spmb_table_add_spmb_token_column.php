<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSpmbTableAddSpmbTokenColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('spmb')) {
            Schema::table('spmb', function($table) {
                DB::statement('ALTER TABLE spmb ADD spmb_token CHAR(6) AFTER spmb_method');
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
