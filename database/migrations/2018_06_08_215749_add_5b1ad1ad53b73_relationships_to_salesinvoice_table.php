<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ad1ad53b73RelationshipsToSalesInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_invoices', function(Blueprint $table) {
            if (!Schema::hasColumn('sales_invoices', 'company_id')) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id', '4867_5b1a9770d9faa')->references('id')->on('create_companies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('sales_invoices', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '4867_5b1a9770e4032')->references('id')->on('customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('sales_invoices', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4867_5b1a92a08dea9')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('sales_invoices', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4867_5b1a92a094e7e')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('sales_invoices', function(Blueprint $table) {
            
        });
    }
}
