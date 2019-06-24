<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->string('inv_no');
            $table->string('company_name');
            $table->text('company_address');
            $table->string('date')->nullable();
            $table->string('product_name');
            $table->string('hsn_code');
            $table->decimal('qty');
            $table->decimal('rate');
            $table->string('pcs_kgs');
            $table->string('gst_rate');
            $table->decimal('total');
            $table->decimal('CGST')->nullable();
            $table->decimal('SGST')->nullable();
            $table->decimal('IGST')->nullable();
            $table->decimal('invoice_amount');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
