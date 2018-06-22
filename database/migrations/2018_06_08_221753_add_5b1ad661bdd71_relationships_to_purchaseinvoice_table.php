<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ad661bdd71RelationshipsToPurchaseInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_invoices', function(Blueprint $table) {
            if (!Schema::hasColumn('purchase_invoices', 'company_id')) {
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id', '4875_5b1a97c0d0ae5')->references('id')->on('create_companies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('purchase_invoices', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '4875_5b1a97c0d878f')->references('id')->on('suppliers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('purchase_invoices', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4875_5b1a97c0e0aee')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('purchase_invoices', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4875_5b1a97c0e894b')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('purchase_invoices', function(Blueprint $table) {
            
        });
    }
}
