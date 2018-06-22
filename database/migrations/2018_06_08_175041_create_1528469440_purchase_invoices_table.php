<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1528469440PurchaseInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('purchase_invoices')) {
            Schema::create('purchase_invoices', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('invoice_no')->nullable();
                $table->date('invoice_date')->nullable();
                $table->integer('quantity')->nullable()->unsigned();
                $table->decimal('price', 15, 2)->nullable();
                $table->decimal('vat', 15, 2)->nullable();
                $table->decimal('discount', 15, 2)->nullable();
                $table->decimal('amount_before_vat', 15, 2)->nullable();
                $table->decimal('transaction_total', 15, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('purchase_invoices');
    }
}
