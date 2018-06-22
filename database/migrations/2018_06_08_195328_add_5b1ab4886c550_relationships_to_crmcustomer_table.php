<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ab4886c550RelationshipsToCrmCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_customers', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_customers', 'crm_status_id')) {
                $table->integer('crm_status_id')->unsigned()->nullable();
                $table->foreign('crm_status_id', '4861_5b1a8f7ce2491')->references('id')->on('crm_statuses')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_customers', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4861_5b1ab4884e2a9')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_customers', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4861_5b1ab48852522')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('crm_customers', function(Blueprint $table) {
            
        });
    }
}
