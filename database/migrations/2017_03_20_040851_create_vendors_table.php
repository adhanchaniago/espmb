<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('vendors')) {
            Schema::create('vendors', function (Blueprint $table) {
                $table->increments('vendor_id');
                $table->integer('vendor_type_id');
                $table->string('vendor_name');
                $table->text('vendor_address')->nullable();
                $table->string('vendor_phone')->nullable();
                $table->string('vendor_fax')->nullable();
                $table->string('vendor_email')->nullable();
                $table->text('vendor_note')->nullable();
                $table->integer('term_of_payment_id');
                $table->integer('term_of_payment_value');
                $table->enum('vendor_status', ['PERMANENT', 'ONE TIME'])->default('PERMANENT');
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
        Schema::dropIfExists('vendors');
    }
}
