<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1528469360SalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_invoices', function (Blueprint $table) {
            
if (!Schema::hasColumn('sales_invoices', 'quantity')) {
                $table->integer('quantity')->nullable()->unsigned();
                }
if (!Schema::hasColumn('sales_invoices', 'price')) {
                $table->decimal('price', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales_invoices', 'vat')) {
                $table->decimal('vat', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales_invoices', 'discount')) {
                $table->decimal('discount', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales_invoices', 'amount_before_vat')) {
                $table->decimal('amount_before_vat', 15, 2)->nullable();
                }
if (!Schema::hasColumn('sales_invoices', 'transaction_total')) {
                $table->decimal('transaction_total', 15, 2)->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_invoices', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('price');
            $table->dropColumn('vat');
            $table->dropColumn('discount');
            $table->dropColumn('amount_before_vat');
            $table->dropColumn('transaction_total');
            
        });

    }
}
