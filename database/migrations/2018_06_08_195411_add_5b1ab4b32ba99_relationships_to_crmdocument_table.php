<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b1ab4b32ba99RelationshipsToCrmDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_documents', function(Blueprint $table) {
            if (!Schema::hasColumn('crm_documents', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '4863_5b1a8f7e5c821')->references('id')->on('crm_customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_documents', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '4863_5b1ab4b30efc3')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('crm_documents', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '4863_5b1ab4b312592')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('crm_documents', function(Blueprint $table) {
            
        });
    }
}
