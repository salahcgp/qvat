<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1a92a0b254cRelationshipsToSalesInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_invoices', function(Blueprint $table) {
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
